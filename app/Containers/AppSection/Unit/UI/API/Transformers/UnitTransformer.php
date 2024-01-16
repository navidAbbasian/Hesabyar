<?php

namespace App\Containers\AppSection\Unit\UI\API\Transformers;

use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class UnitTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Unit $unit): array
    {
        $response = [
            'object' => $unit->getResourceKey(),
            'id' => $unit->getHashedKey(),
            'unit' => $unit->unit,
            'amount' => $unit->amount,
            'created_at' => $unit->created_at,
            'deleted_at' => $unit->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $unit->id,
            'updated_at' => $unit->updated_at,
            'readable_created_at' => $unit->created_at->diffForHumans(),
            'readable_updated_at' => $unit->updated_at->diffForHumans(),
            // 'deleted_at' => $unit->deleted_at,
        ], $response);
    }
}
