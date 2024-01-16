<?php

namespace App\Containers\AppSection\Product\UI\API\Transformers;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\ProductCategory\UI\API\Transformers\ProductCategoryTransformer;
use App\Containers\AppSection\Unit\UI\API\Transformers\UnitTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProductTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
        'unit'
    ];

    protected array $availableIncludes = [
        'productCategory'
    ];

    public function transform(Product $product): array
    {
        $array = [
            'object' => $product->getResourceKey(),
            'id' => $product->getHashedKey(),
            'name' => $product->name,
            'code' => $product->code,
            'image' => $product->image,
            'type' => $product->type,
            'buy_price' => $product->buy_price,
            'sale_price' => $product->sale_price,
            'quantity' => $product->quantity,
            'status' => $product->status,
            'description' => $product->description,
            'created_at' => $product->created_at,
            'deleted_at' => $product->deleted_at
        ];
        if ($product->type) {
            $subArray = [
                'total_working_hours' => $product->total_working_hours,
                'continuous_material_rate' => $product->continuous_material_rate,
                'total_materials_used' => $product->total_materials_used,
                'indirect_cost_of_work' => $product->indirect_cost_of_work,
                'indirect_cost_of_material' => $product->indirect_cost_of_material,
                'other_costs' => $product->other_costs
            ];
        } else {
            $subArray = [];
        }

        $response = array_merge($array, $subArray);

        return $this->ifAdmin([
            'real_id' => $product->id,
            'updated_at' => $product->updated_at,
            'readable_created_at' => $product->created_at->diffForHumans(),
            'readable_updated_at' => $product->updated_at->diffForHumans(),
            // 'deleted_at' => $product->deleted_at,
        ], $response);
    }

    public function includeProductCategory(Product $product): \League\Fractal\Resource\Item
    {
        return $this->item($product->productCategory, new ProductCategoryTransformer());
    }


    public function includeUnit(Product $product)
    {
        if ($product->unit != null)
        {
            return $this->item($product->unit, new UnitTransformer());
        }else{
            return ;
        }
    }
}
