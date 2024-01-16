<?php

namespace App\Containers\AppSection\ChequeReceived\UI\API\Transformers;

use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChequeReceivedTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'person', 'user'
    ];

    public function transform(ChequeReceived $chequereceived): array
    {
        $response = [
            'object' => $chequereceived->getResourceKey(),
            'id' => $chequereceived->getHashedKey(),
            'date' => $chequereceived->date,
            'bank_name' => $chequereceived->bank_name,
            'branch_name' => $chequereceived->branch_name,
            'amount' => $chequereceived->amount,
            'description' => $chequereceived->description,
            'cheque_image' => $chequereceived->cheque_image,
            'status' => $chequereceived->status,
            'created_at' => $chequereceived->created_at,
            'deleted_at' => $chequereceived->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $chequereceived->id,
            'updated_at' => $chequereceived->updated_at,
            'readable_created_at' => $chequereceived->created_at->diffForHumans(),
            'readable_updated_at' => $chequereceived->updated_at->diffForHumans(),
            // 'deleted_at' => $chequereceived->deleted_at,
        ], $response);
    }

    public function includePerson(ChequeReceived $chequeReceived): \League\Fractal\Resource\Item
    {
        return $this->item($chequeReceived->person, new PersonTransformer());
    }

    public function includeUser(ChequeReceived $chequeReceived)
    {
        if ($chequeReceived->user_id != null) {
            return $this->item($chequeReceived->user, new UserTransformer());
        } else {
            return;
        }
    }
}
