<?php

namespace App\Containers\AppSection\SideCost\Data\Factories;

use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SideCostFactory extends ParentFactory
{
    protected $model = SideCost::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
