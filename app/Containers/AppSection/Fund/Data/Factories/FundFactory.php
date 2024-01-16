<?php

namespace App\Containers\AppSection\Fund\Data\Factories;

use App\Containers\AppSection\Fund\Models\Fund;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class FundFactory extends ParentFactory
{
    protected $model = Fund::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
