<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Data\Factories;

use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BuyProductFactorItemFactory extends ParentFactory
{
    protected $model = BuyProductFactorItem::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
