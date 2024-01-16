<?php

namespace App\Containers\AppSection\BuyProductFactor\Tasks;

use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactor\Events\BuyProductFactorCreatedEvent;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class CreateBuyProductFactorTask extends ParentTask
{


    /**
     * @param BuyProductFactorRepository $repository
     */
    public function __construct(
        protected BuyProductFactorRepository $repository,
        protected TransactionRepository      $transactionRepository
    )
    {

    }


    /**
     * @param array $data
     * @return BuyProductFactor
     * @throws CreateResourceFailedException
     */
    public function run(array $data): BuyProductFactor
    {
//        try {
        DB::beginTransaction();

        /** separate products from data */
        $products = $data['products'];
        unset($data['products']);

        /** create factor number */
        $latestBuyProductFactorNumber = BuyProductFactor::latest()->withTrashed()->first();
        if ($latestBuyProductFactorNumber) {
            $data['factor_number'] = $latestBuyProductFactorNumber['factor_number'] + 1;
        } else {
            $data['factor_number'] = 1;
        }

        $buyproductfactor = $this->repository->create($data);

        /** set buy product factor item's items */
        for ($j = 0; $j < count($products); $j++) {
            $products[$j]['factor_id'] = $buyproductfactor->id;
            $products[$j]['created_at'] = Carbon::now();
            $products[$j]['updated_at'] = Carbon::now();
            $productsQuantity[$j] = $products[$j]['quantity'];
        }

        /** inset factor items */
        BuyProductFactorItem::insert($products);

        $sumTotalPrice = 0;
        /** update product inventory, calculate tax and discount and sum total factor */
        for ($i = 0; $i < count($products); $i++) {
            $updateInventoryProduct[$i] = Product::find($products[$i]['product_id']);

            $totalPrice[$i] = $updateInventoryProduct[$i]['buy_price'] * $productsQuantity[$i];
            $sumTotalPrice += $totalPrice[$i];

            $percentDiscount = ($sumTotalPrice * $data['discount']) / 100;

            ($data['discount_type'] == 1) ? $discount = $percentDiscount : $discount = $data['discount'];

            $tax = (($sumTotalPrice - $discount) * $data['tax']) / 100;

            $buyproductfactor['sum_total_factor'] = $sumTotalPrice - $discount + $tax;

            $updateInventoryProduct[$i]->quantity = $updateInventoryProduct[$i]->quantity + $productsQuantity[$i]; //increase product inventory

            $updateInventoryProduct[$i]->save();
        }

        /** create transaction */
        $this->transactionRepository->create([
            'is_deposit' => 0,
            'type' => 2,
            'amount' => $buyproductfactor['sum_total_factor'],
            'person_id' => $data['person_id'],
            'buy_product_factor_id' => $buyproductfactor->id
        ]);

        /** set sum total factor */
        $buyproductfactor->save();

        BuyProductFactorCreatedEvent::dispatch($buyproductfactor);
        DB::commit();
        return $buyproductfactor;
//        } catch (Exception) {
//            DB::rollBack();
//            throw new CreateResourceFailedException();
//        }
    }
}
