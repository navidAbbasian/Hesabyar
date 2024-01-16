<?php

namespace App\Containers\AppSection\SellProductFactor\UI\API\Transformers;

use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Transformers\SellProductFactorItemTransformer;
use App\Containers\AppSection\Supplier\UI\API\Transformers\SupplierTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SellProductFactorTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
        'person'
    ];

    protected array $availableIncludes = [
        /*'person',*/
        'supplier', 'user', 'sellProductFactorItems'
    ];

    public function transform(SellProductFactor $sellproductfactor): array
    {
        $response = [
            'object' => $sellproductfactor->getResourceKey(),
            'id' => $sellproductfactor->getHashedKey(),
            'account_number' => $sellproductfactor->bank->account_number ?? null,
            'cart_number' => $sellproductfactor->bank->cart_number ?? null,
            'shaba_number' => $sellproductfactor->bank->shaba_number ?? null,
            'user_name' => $sellproductfactor->user->name,
//            'person_name' =>$sellproductfactor->person->name,
            'factor_number' => $sellproductfactor->factor_number,
            'reverse' => $sellproductfactor->reverse,
//            'title'=>$sellproductfactor->title,
            'due_date' => $sellproductfactor->due_date,
            'sell_date' => $sellproductfactor->sell_date,
            'discount_type' => $sellproductfactor->discount_type,
            'discount' => $sellproductfactor->discount,
            'tax' => $sellproductfactor->tax,
            'description' => $sellproductfactor->description,
            'sum_total_factor' => $sellproductfactor->sum_total_factor,
            'payable_price' => $sellproductfactor->personBalance + $sellproductfactor->sum_total_factor,
            'profit' => $sellproductfactor->profit,
            'created_at' => $sellproductfactor->created_at,
            'deleted_at' => $sellproductfactor->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $sellproductfactor->id,
            'updated_at' => $sellproductfactor->updated_at,
            'readable_created_at' => $sellproductfactor->created_at->diffForHumans(),
            'readable_updated_at' => $sellproductfactor->updated_at->diffForHumans(),
            // 'deleted_at' => $sellproductfactor->deleted_at,
        ], $response);
    }

    public function includeSupplier(SellProductFactor $sellproductfactor): \League\Fractal\Resource\Item
    {
        return $this->item($sellproductfactor->supplier, new SupplierTransformer());
    }

    public function includeUser(SellProductFactor $sellproductfactor): \League\Fractal\Resource\Item
    {
        return $this->item($sellproductfactor->user, new UserTransformer());
    }

    public function includePerson(SellProductFactor $sellproductfactor): \League\Fractal\Resource\Item
    {
        return $this->item($sellproductfactor->person, new PersonTransformer());
    }

    public function includeSellProductFactorItems(SellProductFactor $sellproductfactor): \League\Fractal\Resource\Collection
    {
        return $this->collection($sellproductfactor->sellProductFactorItems, new SellProductFactorItemTransformer());
    }

}
