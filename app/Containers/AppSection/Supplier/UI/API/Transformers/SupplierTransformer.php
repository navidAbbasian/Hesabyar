<?php

namespace App\Containers\AppSection\Supplier\UI\API\Transformers;

use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SupplierTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Supplier $supplier): array
    {
        $response = [
            'object' => $supplier->getResourceKey(),
            'id' => $supplier->getHashedKey(),
            'name'=>$supplier->name,
            'logo'=>$supplier->logo,
            'registration_number'=>$supplier->registration_number,
            'country'=>$supplier->country,
            'province'=>$supplier->province,
            'city'=>$supplier->city,
            'phone'=>$supplier->phone,
            'email'=>$supplier->email,
            'website'=>$supplier->website,
            'created_at' => $supplier->created_at,
            'deleted_at' => $supplier->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $supplier->id,
            'updated_at' => $supplier->updated_at,
            'readable_created_at' => $supplier->created_at->diffForHumans(),
            'readable_updated_at' => $supplier->updated_at->diffForHumans(),
            // 'deleted_at' => $supplier->deleted_at,
        ], $response);
    }
}
