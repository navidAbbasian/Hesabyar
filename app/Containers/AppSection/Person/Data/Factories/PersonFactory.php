<?php

namespace App\Containers\AppSection\Person\Data\Factories;

use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class PersonFactory extends ParentFactory
{
    protected $model = Person::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
