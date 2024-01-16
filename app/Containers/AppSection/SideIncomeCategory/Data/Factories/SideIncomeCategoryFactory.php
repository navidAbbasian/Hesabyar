<?php

namespace App\Containers\AppSection\SideIncomeCategory\Data\Factories;

use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SideIncomeCategoryFactory extends ParentFactory
{
    protected $model = SideIncomeCategory::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
