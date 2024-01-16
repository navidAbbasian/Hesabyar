<?php

namespace App\Containers\AppSection\Supplier\Data\Factories;

use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SupplierFactory extends ParentFactory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
