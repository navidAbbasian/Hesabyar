<?php

namespace App\Containers\AppSection\Bank\Data\Factories;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BankFactory extends ParentFactory
{
    protected $model = Bank::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
