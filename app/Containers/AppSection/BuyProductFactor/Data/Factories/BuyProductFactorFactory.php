<?php

namespace App\Containers\AppSection\BuyProductFactor\Data\Factories;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BuyProductFactorFactory extends ParentFactory
{
    protected $model = BuyProductFactor::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
