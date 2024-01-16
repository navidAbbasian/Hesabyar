<?php

namespace App\Containers\AppSection\BuyProductFactor\Tasks;

use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactor\Events\BuyProductFactorUpdatedEvent;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\SellProductFactor\Exceptions\OutOfStockException;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UpdateBuyProductFactorTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorRepository $repository,
        protected TransactionRepository      $transactionRepository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     * @throws OutOfStockException
     */
    public function run(array $data, $id): BuyProductFactor
    {
//        try {
        DB::beginTransaction();

        $products = $data['products'];
        unset($data['products']);

        $oldInventory = BuyProductFactorItem::where('factor_id', $id)->get();

        $sumTotalPrice = 0;

        for ($i = 0; $i < count($products); $i++) {
            $updateProductInventory = Product::where('id', $products[$i]['product_id'])->withTrashed()->first();

            $updateProductInventory['quantity'] -= $oldInventory[$i]['quantity'];
            $updateProductInventory['quantity'] += $products[$i]['quantity'];
            if ($updateProductInventory['quantity'] < 0) {
                throw new OutOfStockException();
            }

            $oldInventory[$i]['quantity'] = $products[$i]['quantity'];


            $totalPrice[$i] = $updateProductInventory['buy_price'] * $products[$i]['quantity'];
            $sumTotalPrice += $totalPrice[$i];

            $percentDiscount = ($sumTotalPrice * $data['discount']) / 100;

            ($data['discount_type'] == 1) ? $discount = $percentDiscount : $discount = $data['discount'];

            $tax = (($sumTotalPrice - $discount) * $data['tax']) / 100;

            $data['sum_total_factor'] = $sumTotalPrice - $discount + $tax ;

            $oldInventory[$i]->save();
            $updateProductInventory->save();
        }

        $buyproductfactor = $this->repository->update($data, $id);

        /** update transaction */
        $transaction = $this->transactionRepository->where('buy_product_factor_id', $id)->first();
        $transaction['amount'] = $buyproductfactor['sum_total_factor'];

        $transaction->save();

        BuyProductFactorUpdatedEvent::dispatch($buyproductfactor);

        DB::commit();
        return $buyproductfactor;
//        } catch (ModelNotFoundException) {
//            DB::rollBack();
//            throw new NotFoundException();
//        } catch (Exception) {
//            throw new UpdateResourceFailedException();
//        } catch (OutOfStockException) {
//            throw new OutOfStockException();
//        }
    }
}
