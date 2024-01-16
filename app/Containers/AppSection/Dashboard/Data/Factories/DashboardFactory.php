<?php

namespace App\Containers\AppSection\Dashboard\Data\Factories;

use App\Containers\AppSection\Dashboard\Models\Dashboard;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class DashboardFactory extends ParentFactory
{
    protected $model = Dashboard::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
