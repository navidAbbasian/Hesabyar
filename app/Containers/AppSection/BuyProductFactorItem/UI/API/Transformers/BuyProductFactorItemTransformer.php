<?php

namespace App\Containers\AppSection\BuyProductFactorItem\UI\API\Transformers;

use App\Containers\AppSection\BuyProductFactor\UI\API\Transformers\BuyProductFactorTransformer;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class BuyProductFactorItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
        'product'/*, 'buyProductFactor'*/
    ];

    protected array $availableIncludes = [

    ];

    public function transform(BuyProductFactorItem $buyproductfactoritem): array
    {
        $response = [
            'object' => $buyproductfactoritem->getResourceKey(),
            'id' => $buyproductfactoritem->getHashedKey(),
            'quantity'=>$buyproductfactoritem->quantity,
//            'unit_amount'=>$buyproductfactoritem->unit_amount,
            'created_at' => $buyproductfactoritem->created_at,
            'deleted_at' => $buyproductfactoritem->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $buyproductfactoritem->id,
            'updated_at' => $buyproductfactoritem->updated_at,
            'readable_created_at' => $buyproductfactoritem->created_at->diffForHumans(),
            'readable_updated_at' => $buyproductfactoritem->updated_at->diffForHumans(),
            // 'deleted_at' => $buyproductfactoritem->deleted_at,
        ], $response);
    }
    public function includeProduct(BuyProductFactorItem $buyProductFactorItem): \League\Fractal\Resource\Item
    {
        // use `item` with single relationship
        return $this->item($buyProductFactorItem->product, new ProductTransformer());
    }
    public function includeBuyProductFactor(BuyProductFactorItem $buyProductFactorItem): \League\Fractal\Resource\Item
    {
        // use `item` with single relationship
        return $this->item($buyProductFactorItem->buyProductFactor, new BuyProductFactorTransformer());
    }
}
