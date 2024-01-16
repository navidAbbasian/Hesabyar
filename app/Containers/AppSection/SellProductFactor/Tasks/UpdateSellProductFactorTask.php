<?php

namespace App\Containers\AppSection\SellProductFactor\Tasks;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactor\Events\SellProductFactorUpdatedEvent;
use App\Containers\AppSection\SellProductFactor\Exceptions\OutOfStockException;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UpdateSellProductFactorTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorRepository $repository,
        protected TransactionRepository       $transactionRepository

    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     * @throws OutOfStockException
     */
    public function run(array $data, $id): SellProductFactor
    {
//        try {
        DB::beginTransaction();

        $products = $data['products'];
        unset($data['products']);

        $oldInventory = SellProductFactorItem::where('factor_id', $id)->get();

        $sumTotalPrice = 0;

        for ($i = 0; $i < count($products); $i++) {
            $updateProductInventory = Product::where('id', $products[$i]['product_id'])->withTrashed()->first();

            $totalPrice[$i] = $updateProductInventory['sale_price'] * $products[$i]['quantity'];
            $sumTotalPrice += $totalPrice[$i];

            $percentDiscount = ($sumTotalPrice * $data['discount']) / 100;

            ($data['discount_type'] == 1) ? $discount = $percentDiscount : $discount = $data['discount'];

            $tax = (($sumTotalPrice - $discount) * $data['tax']) / 100;

            $data['sum_total_factor'] = $sumTotalPrice + $tax - $discount;

            $updateProductInventory['quantity'] += $oldInventory[$i]['quantity'];
            $updateProductInventory['quantity'] -= $products[$i]['quantity'];
            if ($updateProductInventory['quantity'] < 0) {
                throw new OutOfStockException();
            }

            $oldInventory[$i]['quantity'] = $products[$i]['quantity'];

            $oldInventory[$i]->save();
            $updateProductInventory->save();
        }

        $sellproductfactor = $this->repository->update($data, $id);

        /** update transaction */
        $transaction = $this->transactionRepository->where('sell_product_factor_id', $id)->first();
        $transaction['amount'] = $sellproductfactor['sum_total_factor'];

        $transaction->save();

        SellProductFactorUpdatedEvent::dispatch($sellproductfactor);

        DB::commit();

        return $sellproductfactor;
//        } catch (ModelNotFoundException) {
//            throw new NotFoundException();
//            DB::rollBack();
//        } catch (Exception) {
//            throw new UpdateResourceFailedException();
//        }
    }
}
