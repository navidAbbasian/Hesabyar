<?php

namespace App\Containers\AppSection\BuyProductFactor\UI\API\Transformers;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Transformers\BuyProductFactorItemTransformer;
use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class BuyProductFactorTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'person', 'buyProductFactorItems'
    ];

    public function transform(BuyProductFactor $buyproductfactor): array
    {
        $response = [
            'object' => $buyproductfactor->getResourceKey(),
            'id' => $buyproductfactor->getHashedKey(),
            'factor_number' => $buyproductfactor->factor_number,
            'reverse' => $buyproductfactor->reverse,
//            'title' => $buyproductfactor->title,
            'date' => $buyproductfactor->date,
            'discount_type' => $buyproductfactor->discount_type,
            'discount' => $buyproductfactor->discount,
            'tax' => $buyproductfactor->tax,
            'description' => $buyproductfactor->description,
            'sum_total_factor' => $buyproductfactor->sum_total_factor,
            'created_at' => $buyproductfactor->created_at,
            'deleted_at' => $buyproductfactor->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $buyproductfactor->id,
            'updated_at' => $buyproductfactor->updated_at,
            'readable_created_at' => $buyproductfactor->created_at->diffForHumans(),
            'readable_updated_at' => $buyproductfactor->updated_at->diffForHumans(),
            // 'deleted_at' => $buyproductfactor->deleted_at,
        ], $response);
    }

    public function includePerson(BuyProductFactor $buyProductFactor): \League\Fractal\Resource\Item
    {
        // use `item` with single relationship
        return $this->item($buyProductFactor->person, new PersonTransformer());
    }

    public function includeBuyProductFactorItems(BuyProductFactor $buyProductFactor): \League\Fractal\Resource\Collection
    {
        // use `item` with single relationship
        return $this->collection($buyProductFactor->buyProductFactorItems, new BuyProductFactorItemTransformer());
    }
}
