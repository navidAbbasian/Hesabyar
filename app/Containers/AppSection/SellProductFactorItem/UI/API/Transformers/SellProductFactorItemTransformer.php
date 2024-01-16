<?php

namespace App\Containers\AppSection\SellProductFactorItem\UI\API\Transformers;

use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Containers\AppSection\SellProductFactor\UI\API\Transformers\SellProductFactorTransformer;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SellProductFactorItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
        'product'/*,'sellProductFactor',*/
    ];

    protected array $availableIncludes = [

    ];

    public function transform(SellProductFactorItem $sellproductfactoritem): array
    {
        $response = [
            'object' => $sellproductfactoritem->getResourceKey(),
            'id' => $sellproductfactoritem->getHashedKey(),
            'quantity'=>$sellproductfactoritem->quantity,
//            'unit_amount'=>$sellproductfactoritem->unit_amount,
            'created_at' => $sellproductfactoritem->created_at,
            'deleted_at' => $sellproductfactoritem->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $sellproductfactoritem->id,
            'updated_at' => $sellproductfactoritem->updated_at,
            'readable_created_at' => $sellproductfactoritem->created_at->diffForHumans(),
            'readable_updated_at' => $sellproductfactoritem->updated_at->diffForHumans(),
            // 'deleted_at' => $sellproductfactoritem->deleted_at,
        ], $response);
    }
    public function includeProduct(SellProductFactorItem $sellProductFactorItem): \League\Fractal\Resource\Item
    {
        // use `item` with single relationship
        return $this->item($sellProductFactorItem->product, new ProductTransformer());
    }
    public function includeSellProductFactor(SellProductFactorItem $sellProductFactorItem): \League\Fractal\Resource\Item
    {
        // use `item` with single relationship
        return $this->item($sellProductFactorItem->sellProductFactor, new SellProductFactorTransformer());
    }
}
