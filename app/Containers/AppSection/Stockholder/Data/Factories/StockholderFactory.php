<?php

namespace App\Containers\AppSection\Stockholder\Data\Factories;

use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class StockholderFactory extends ParentFactory
{
    protected $model = Stockholder::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
