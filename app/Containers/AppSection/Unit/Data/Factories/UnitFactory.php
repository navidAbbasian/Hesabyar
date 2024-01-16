<?php

namespace App\Containers\AppSection\Unit\Data\Factories;

use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class UnitFactory extends ParentFactory
{
    protected $model = Unit::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
