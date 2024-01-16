<?php

namespace App\Containers\AppSection\ChequePayment\Data\Factories;

use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ChequePaymentFactory extends ParentFactory
{
    protected $model = ChequePayment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
