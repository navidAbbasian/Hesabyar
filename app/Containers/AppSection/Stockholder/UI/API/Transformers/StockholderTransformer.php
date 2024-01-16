<?php

namespace App\Containers\AppSection\Stockholder\UI\API\Transformers;

use App\Containers\AppSection\Company\UI\API\Transformers\CompanyTransformer;
use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class StockholderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
    ];

    public function transform(Stockholder $stockholder): array
    {
        $response = [
            'object' => $stockholder->getResourceKey(),
            'id' => $stockholder->getHashedKey(),
            'name'=>$stockholder->name,
            'family'=>$stockholder->family,
            'image'=>$stockholder->image,
            'company_id'=>$stockholder->company_id,
            'alias'=>$stockholder->alias,
            'national_id'=>$stockholder->national_id,
            'economic_code'=>$stockholder->economic_code,
            'registration_number'=>$stockholder->registration_number,
            'description'=>$stockholder->description,
            'country'=>$stockholder->country,
            'province'=>$stockholder->province,
            'city'=>$stockholder->city,
            'address'=>$stockholder->address,
            'postal_code'=>$stockholder->postal_code,
            'phone_number'=>$stockholder->phone_number,
            'telephone_number'=>$stockholder->telephone_number,
            'fax_number'=>$stockholder->fax_number,
            'email'=>$stockholder->email,
            'website'=>$stockholder->website,
            'created_at' => $stockholder->created_at,
            'deleted_at' => $stockholder->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $stockholder->id,
            'updated_at' => $stockholder->updated_at,
            'readable_created_at' => $stockholder->created_at->diffForHumans(),
            'readable_updated_at' => $stockholder->updated_at->diffForHumans(),
            // 'deleted_at' => $stockholder->deleted_at,
        ], $response);
    }
//    public function includeCompany(Stockholder $stockholder)
//    {
//        if ($stockholder->company_id != null){
//            return $this->item($stockholder->company, new CompanyTransformer());
//        }else{
//            return ;
//        }
//    }

}
