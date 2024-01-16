<?php

namespace App\Containers\AppSection\PersonCategory\UI\API\Transformers;

use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class PersonCategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(PersonCategory $personcategory): array
    {
        $response = [
            'object' => $personcategory->getResourceKey(),
            'id' => $personcategory->getHashedKey(),
            'name' =>$personcategory->name,
            'description' =>$personcategory->description,
            'created_at' => $personcategory->created_at,
            'deleted_at' => $personcategory->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $personcategory->id,
            'updated_at' => $personcategory->updated_at,
            'readable_created_at' => $personcategory->created_at->diffForHumans(),
            'readable_updated_at' => $personcategory->updated_at->diffForHumans(),
            // 'deleted_at' => $personcategory->deleted_at,
        ], $response);
    }
}
