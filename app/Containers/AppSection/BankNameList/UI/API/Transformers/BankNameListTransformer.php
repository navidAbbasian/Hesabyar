<?php

namespace App\Containers\AppSection\BankNameList\UI\API\Transformers;

use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class BankNameListTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(BankNameList $banknamelist): array
    {
        $response = [
            'object' => $banknamelist->getResourceKey(),
            'id' => $banknamelist->getHashedKey(),
            'name' => $banknamelist->name,
            'created_at' => $banknamelist->created_at,
            'deleted_at' => $banknamelist->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $banknamelist->id,
            'updated_at' => $banknamelist->updated_at,
            'readable_created_at' => $banknamelist->created_at->diffForHumans(),
            'readable_updated_at' => $banknamelist->updated_at->diffForHumans(),
            // 'deleted_at' => $banknamelist->deleted_at,
        ], $response);
    }
}
