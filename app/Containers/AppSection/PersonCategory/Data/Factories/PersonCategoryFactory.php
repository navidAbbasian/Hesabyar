<?php

namespace App\Containers\AppSection\PersonCategory\Data\Factories;

use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class PersonCategoryFactory extends ParentFactory
{
    protected $model = PersonCategory::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
