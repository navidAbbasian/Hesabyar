<?php

namespace App\Containers\AppSection\ChequePayment\UI\API\Transformers;

use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChequePaymentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'person', 'transactions'
    ];

    public function transform(ChequePayment $chequepayment): array
    {
        $response = [
            'object' => $chequepayment->getResourceKey(),
            'id' => $chequepayment->getHashedKey(),
            'date' => $chequepayment->date,
            'bank_name' => $chequepayment->bank_name,
            'branch_name' => $chequepayment->branch_name,
            'amount' => $chequepayment->amount,
            'description' => $chequepayment->description,
            'status' => $chequepayment->status,
            'created_at' => $chequepayment->created_at,
            'deleted_at' => $chequepayment->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $chequepayment->id,
            'updated_at' => $chequepayment->updated_at,
            'readable_created_at' => $chequepayment->created_at->diffForHumans(),
            'readable_updated_at' => $chequepayment->updated_at->diffForHumans(),
            // 'deleted_at' => $chequepayment->deleted_at,
        ], $response);
    }

    public function includePerson(ChequePayment $chequePayment): \League\Fractal\Resource\Item
    {
        return $this->item($chequePayment->person, new PersonTransformer());
    }

    public function includeTransactions(ChequePayment $chequePayment)
    {
        if ($chequePayment->transactions != null) {
            return $this->collection($chequePayment->transactions, new TransactionTransformer());
        } else {
            return;
        }
    }
}
