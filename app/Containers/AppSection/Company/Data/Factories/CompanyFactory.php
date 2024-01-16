<?php

namespace App\Containers\AppSection\Company\Data\Factories;

use App\Containers\AppSection\Company\Models\Company;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CompanyFactory extends ParentFactory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
