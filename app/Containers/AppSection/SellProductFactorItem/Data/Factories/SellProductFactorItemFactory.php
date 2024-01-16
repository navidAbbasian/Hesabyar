<?php

namespace App\Containers\AppSection\SellProductFactorItem\Data\Factories;

use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SellProductFactorItemFactory extends ParentFactory
{
    protected $model = SellProductFactorItem::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
