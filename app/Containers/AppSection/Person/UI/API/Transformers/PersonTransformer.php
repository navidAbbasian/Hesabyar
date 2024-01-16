<?php

namespace App\Containers\AppSection\Person\UI\API\Transformers;

use App\Containers\AppSection\BuyProductFactor\UI\API\Transformers\BuyProductFactorTransformer;
use App\Containers\AppSection\ChequePayment\UI\API\Transformers\ChequePaymentTransformer;
use App\Containers\AppSection\Company\UI\API\Transformers\CompanyTransformer;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\PersonCategory\UI\API\Transformers\PersonCategoryTransformer;
use App\Containers\AppSection\SellProductFactor\UI\API\Transformers\SellProductFactorTransformer;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class PersonTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'company','personCategory','chequePayments','buyProductFactors','sellProductFactors','transactions'
    ];

    public function transform(Person $person): array
    {
        $response = [
            'object' => $person->getResourceKey(),
            'id' => $person->getHashedKey(),
            'balance' => $person->balance,
            'name'=>$person->name,
            'family'=>$person->family,
            'image' => $person->image,
            'description'=>$person->description,
            'country'=>$person->country,
            'province'=>$person->province,
            'city'=>$person->city,
            'address'=>$person->address,
            'postal_code'=>$person->postal_code,
            'phone_number'=>$person->phone_number,
            'telephone_number'=>$person->telephone_number,
            'fax_number'=>$person->fax_number,
            'email'=>$person->email,
            'website'=>$person->website,
            'created_at' => $person->created_at,
            'deleted_at' => $person->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $person->id,
            'updated_at' => $person->updated_at,
            'readable_created_at' => $person->created_at->diffForHumans(),
            'readable_updated_at' => $person->updated_at->diffForHumans(),
            // 'deleted_at' => $person->deleted_at,
        ], $response);
    }

    public function includePersonCategory(Person $person): \League\Fractal\Resource\Item
    {
        return $this->item($person->personCategory, new PersonCategoryTransformer());
    }
    public function includeCompany(Person $person)
    {
        if ($person->company_id != null){
            return $this->item($person->company, new CompanyTransformer());
        }else{
            return ;
        }
    }
    public function includeChequePayments(Person $person)
    {
        if ($person->chequePayments != null){
            return $this->collection($person->chequePayments, new ChequePaymentTransformer());
        }else{
            return ;
        }
    }
    public function includeBuyProductFactors(Person $person)
    {
        if ($person->buyProductFactors != null){
            return $this->collection($person->buyProductFactors, new BuyProductFactorTransformer());
        }else{
            return ;
        }
    }
    public function includeSellProductFactors(Person $person)
    {
        if ($person->sellProductFactors != null){
            return $this->collection($person->sellProductFactors, new SellProductFactorTransformer());
        }else{
            return ;
        }
    }
    public function includeTransactions(Person $person)
    {
        if ($person->transactions != null){
            return $this->collection($person->transactions, new TransactionTransformer());
        }else{
            return ;
        }
    }
}
