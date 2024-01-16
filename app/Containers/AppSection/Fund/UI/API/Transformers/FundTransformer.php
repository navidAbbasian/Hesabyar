<?php

namespace App\Containers\AppSection\Fund\UI\API\Transformers;

use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FundTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
        'transactions'
    ];

    public function transform(Fund $fund): array
    {
        $response = [
            'object' => $fund->getResourceKey(),
            'id' => $fund->getHashedKey(),
            'title' => $fund->title,
            'inventory' => $fund->inventory,
            'description' => $fund->description,
            'status' => $fund->status,
            'created_at' => $fund->created_at,
            'deleted_at' => $fund->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $fund->id,
            'updated_at' => $fund->updated_at,
            'readable_created_at' => $fund->created_at->diffForHumans(),
            'readable_updated_at' => $fund->updated_at->diffForHumans(),
            // 'deleted_at' => $fund->deleted_at,
        ], $response);
    }

    public function includeTransactions(Fund $fund)
    {
        // use collection with `multi` relationship
        return $this->collection($fund->transactions, new TransactionTransformer());
    }
}
