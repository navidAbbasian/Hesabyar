<?php

namespace App\Containers\AppSection\SideCostCategory\Data\Factories;

use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SideCostCategoryFactory extends ParentFactory
{
    protected $model = SideCostCategory::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
