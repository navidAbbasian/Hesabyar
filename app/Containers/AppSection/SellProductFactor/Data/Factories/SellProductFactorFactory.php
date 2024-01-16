<?php

namespace App\Containers\AppSection\SellProductFactor\Data\Factories;

use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SellProductFactorFactory extends ParentFactory
{
    protected $model = SellProductFactor::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
