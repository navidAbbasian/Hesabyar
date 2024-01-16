<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Data\Factories;

use App\Containers\AppSection\SellProductFactorReverse\Models\SellProductFactorReverse;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SellProductFactorReverseFactory extends ParentFactory
{
    protected $model = SellProductFactorReverse::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
