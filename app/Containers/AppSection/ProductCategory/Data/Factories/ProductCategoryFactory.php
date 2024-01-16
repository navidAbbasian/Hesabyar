<?php

namespace App\Containers\AppSection\ProductCategory\Data\Factories;

use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ProductCategoryFactory extends ParentFactory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
