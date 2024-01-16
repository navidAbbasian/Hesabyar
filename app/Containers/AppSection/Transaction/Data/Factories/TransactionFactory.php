<?php

namespace App\Containers\AppSection\Transaction\Data\Factories;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class TransactionFactory extends ParentFactory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
