<?php

namespace App\Containers\AppSection\SideIncomeCategory\UI\API\Transformers;

use App\Containers\AppSection\SideIncome\UI\API\Transformers\SideIncomeTransformer;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SideIncomeCategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
//        'sideIncomes'
    ];

    protected array $availableIncludes = [

    ];

    public function transform(SideIncomeCategory $sideincomecategory): array
    {
        $response = [
            'object' => $sideincomecategory->getResourceKey(),
            'id' => $sideincomecategory->getHashedKey(),
            'name'=>$sideincomecategory->name,
            'description'=>$sideincomecategory->description,
            'created_at' => $sideincomecategory->created_at,
            'deleted_at' => $sideincomecategory->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $sideincomecategory->id,
            'updated_at' => $sideincomecategory->updated_at,
            'readable_created_at' => $sideincomecategory->created_at->diffForHumans(),
            'readable_updated_at' => $sideincomecategory->updated_at->diffForHumans(),
            // 'deleted_at' => $sideincomecategory->deleted_at,
        ], $response);
    }
//    public function includeSideIncomes(SideIncomeCategory $sideIncomeCategory)
//    {
//        return $this->collection($sideIncomeCategory->sideIncomes,  new SideIncomeTransformer());
//    }
}
