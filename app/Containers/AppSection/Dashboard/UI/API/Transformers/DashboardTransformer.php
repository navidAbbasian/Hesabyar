<?php

namespace App\Containers\AppSection\Dashboard\UI\API\Transformers;

use App\Containers\AppSection\Dashboard\Models\Dashboard;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DashboardTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Dashboard $dashboard): array
    {
        $response = [
            'object' => $dashboard->getResourceKey(),
            'id' => $dashboard->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $dashboard->id,
            'created_at' => $dashboard->created_at,
            'updated_at' => $dashboard->updated_at,
            'readable_created_at' => $dashboard->created_at->diffForHumans(),
            'readable_updated_at' => $dashboard->updated_at->diffForHumans(),
            // 'deleted_at' => $dashboard->deleted_at,
        ], $response);
    }
}
