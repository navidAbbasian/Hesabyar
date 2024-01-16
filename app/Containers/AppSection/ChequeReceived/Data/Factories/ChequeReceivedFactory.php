<?php

namespace App\Containers\AppSection\ChequeReceived\Data\Factories;

use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ChequeReceivedFactory extends ParentFactory
{
    protected $model = ChequeReceived::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
