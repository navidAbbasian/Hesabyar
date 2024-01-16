<?php

namespace App\Containers\AppSection\SideIncome\Data\Factories;

use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SideIncomeFactory extends ParentFactory
{
    protected $model = SideIncome::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
