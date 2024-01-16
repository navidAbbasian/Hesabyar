<?php

namespace App\Containers\AppSection\Bank\UI\API\Transformers;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class BankTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'transactions'
    ];

    public function transform(Bank $bank): array
    {
        $response = [
            'object' => $bank->getResourceKey(),
            'id' => $bank->getHashedKey(),
            'name' => $bank->name,
            'branch' => $bank->branch,
            'account_number'=> $bank->account_number,
            'cart_number'=>$bank->cart_number,
            'shaba_number'=>$bank->shaba_number,
            'pos_number'=>$bank->pos_number,
            'account_owner'=>$bank->account_owner,
            'status'=>$bank->status,
            'description'=>$bank->description,
            'inventory'=>$bank->inventory,
            'person_id' => $bank->person_id,
            'created_at' => $bank->created_at,
            'deleted_at' => $bank->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $bank->id,
            'updated_at' => $bank->updated_at,
            'readable_created_at' => $bank->created_at->diffForHumans(),
            'readable_updated_at' => $bank->updated_at->diffForHumans(),
            // 'deleted_at' => $bank->deleted_at,
        ], $response);
    }

    public function includeTransactions(Bank $bank)
    {
        if ($bank->transactions != null){
        return $this->collection($bank->transactions, new TransactionTransformer());
        }else{
            return;
        }
    }
}
