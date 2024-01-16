<?php

namespace App\Containers\AppSection\SideCostCategory\UI\API\Transformers;

use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SideCostCategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(SideCostCategory $sidecostcategory): array
    {
        $response = [
            'object' => $sidecostcategory->getResourceKey(),
            'id' => $sidecostcategory->getHashedKey(),
            'name'=>$sidecostcategory->name,
            'description'=>$sidecostcategory->description,
            'created_at' => $sidecostcategory->created_at,
            'deleted_at' => $sidecostcategory->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $sidecostcategory->id,
            'updated_at' => $sidecostcategory->updated_at,
            'readable_created_at' => $sidecostcategory->created_at->diffForHumans(),
            'readable_updated_at' => $sidecostcategory->updated_at->diffForHumans(),
            // 'deleted_at' => $sidecostcategory->deleted_at,
        ], $response);
    }
}
