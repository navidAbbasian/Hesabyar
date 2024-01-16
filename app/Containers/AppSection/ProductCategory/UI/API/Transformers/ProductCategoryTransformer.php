<?php

namespace App\Containers\AppSection\ProductCategory\UI\API\Transformers;

use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProductCategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ProductCategory $productcategory): array
    {
        $response = [
            'object' => $productcategory->getResourceKey(),
            'id' => $productcategory->getHashedKey(),
            'name' => $productcategory->name,
            'description' => $productcategory->description,
            'created_at' => $productcategory->created_at,
            'deleted_at' => $productcategory->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $productcategory->id,
            'updated_at' => $productcategory->updated_at,
            'readable_created_at' => $productcategory->created_at->diffForHumans(),
            'readable_updated_at' => $productcategory->updated_at->diffForHumans(),
            // 'deleted_at' => $productcategory->deleted_at,
        ], $response);
    }
}
