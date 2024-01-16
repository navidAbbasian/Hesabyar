<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Data\Factories;

use App\Containers\AppSection\BuyProductFactorReverse\Models\BuyProductFactorReverse;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BuyProductFactorReverseFactory extends ParentFactory
{
    protected $model = BuyProductFactorReverse::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
