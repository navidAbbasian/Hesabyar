<?php

namespace App\Containers\AppSection\Company\UI\API\Transformers;

use App\Containers\AppSection\Company\Models\Company;
use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CompanyTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'persons'
    ];

    public function transform(Company $company): array
    {
        $response = [
            'object' => $company->getResourceKey(),
            'id' => $company->getHashedKey(),
            'name'=>$company->name,
            'logo'=>$company->logo,
            'registration_number'=>$company->registration_number,
            'country'=>$company->country,
            'province'=>$company->province,
            'city'=>$company->city,
            'phone'=>$company->phone,
            'email'=>$company->email,
            'website'=>$company->website,
            'national_id'=>$company->national_id,
            'economic_code'=>$company->economic_code,
            'created_at' => $company->created_at,
            'deleted_at' => $company->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $company->id,
            'updated_at' => $company->updated_at,
            'readable_created_at' => $company->created_at->diffForHumans(),
            'readable_updated_at' => $company->updated_at->diffForHumans(),
            // 'deleted_at' => $company->deleted_at,
        ], $response);
    }
    public function includePersons(Company $company)
    {
        return $this->collection($company->persons, new PersonTransformer());
    }
}
