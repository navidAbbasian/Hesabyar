<?php

namespace App\Containers\AppSection\SellProductFactor\Tasks;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactor\Events\SellProductFactorCreatedEvent;
use App\Containers\AppSection\SellProductFactor\Exceptions\OutOfStockException;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;


class CreateSellProductFactorTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorRepository $repository,
        protected TransactionRepository       $transactionRepository,
        protected UserRepository              $userRepository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws OutOfStockException
     */
    public function run(array $data)
    {
//        try {
        DB::beginTransaction();

        /** separate products from data */
        $products = $data['products'];
        unset($data['products']);

        /** create factor number */
        $latestSellProductFactorNumber = SellProductFactor::latest()->withTrashed()->first();
        if ($latestSellProductFactorNumber) {
            $data['factor_number'] = $latestSellProductFactorNumber['factor_number'] + 1;
        } else {
            $data['factor_number'] = 1;
        }

        $sellproductfactor = $this->repository->create($data);

        /** set sell product factor item's items */
        for ($i = 0; $i < count($products); $i++) {
            $products[$i]['factor_id'] = $sellproductfactor->id;
            $products[$i]['created_at'] = Carbon::now();
            $products[$i]['updated_at'] = Carbon::now();
            $productsQuantity[$i] = $products[$i]['quantity'];
        }

        /** inset factor items */
        SellProductFactorItem::insert($products);

        $totalProfit = 0;
        $sumTotalPrice = 0;
        /** update product inventory, calculate tax and discount and sum total factor */
        for ($j = 0; $j < count($products); $j++) {
            $updateInventoryProduct[$j] = Product::find($products[$j]['product_id']);
            if ($updateInventoryProduct[$j]->quantity >= $productsQuantity[$j]) {


                $totalPrice[$j] = $updateInventoryProduct[$j]['sale_price'] * $productsQuantity[$j];
                $sumTotalPrice += $totalPrice[$j];

                $percentDiscount = ($sumTotalPrice * $data['discount']) / 100;

                ($data['discount_type'] == 1) ? $discount = $percentDiscount : $discount = $data['discount'];

                $tax = (($sumTotalPrice - $discount) * $data['tax']) / 100;

                $totalProfit += ($productsQuantity[$j] * $updateInventoryProduct[$j]['buy_price']);

                $sellproductfactor['sum_total_factor'] = $sumTotalPrice + $tax - $discount;

                $updateInventoryProduct[$j]->quantity = $updateInventoryProduct[$j]->quantity - $productsQuantity[$j];
                $updateInventoryProduct[$j]->save();

            } else {
                throw new OutOfStockException();
            }

        }
        /** create factor transaction */
        $this->transactionRepository->create([
            'is_deposit' => 1,
            'type' => 1,
            'amount' => $sellproductfactor['sum_total_factor'],
            'person_id' => $data['person_id'],
            'user_id' => $data['user_id'],
            'sell_product_factor_id' => $sellproductfactor->id
        ]);


//        /** create commission transaction */
//        $seller = $this->userRepository->find($data['user_id']);
//        $commission = ($sellproductfactor['sum_total_factor'] * $seller['commission']) / 100;
//
//        $this->transactionRepository->create([
//            'is_deposit' => '0',
//            'type' => 7,
//            'amount' => $commission,
//            'sell_product_factor_id' => $sellproductfactor->id,
//            'user_id' => $data['user_id']
//        ]);
//
//        /** create sub-commission transaction */
//        if ($seller['parent_id'] != null) {
//            $salesManager = $this->userRepository->find($seller['parent_id']);
//
//            $sub_commission = ($sellproductfactor['sum_total_factor'] * $salesManager['sub_commission']) / 100;
//
//            $this->transactionRepository->create([
//                'is_deposit' => 0,
//                'type' => 8,
//                'amount' => $sub_commission,
//                'sell_product_factor_id' => $sellproductfactor->id,
//                'user_id' => $salesManager['id']
//            ]);
//        }


        /** set total profit */
        $sellproductfactor['profit'] = $sellproductfactor['sum_total_factor'] - $totalProfit;


        /** set sum total factor */
        $sellproductfactor->save();


        SellProductFactorCreatedEvent::dispatch($sellproductfactor);
        DB::commit();
        return $sellproductfactor;
//        } catch (Exception) {
//            DB::rollBack();
//            throw new CreateResourceFailedException();
//        }
    }
}
