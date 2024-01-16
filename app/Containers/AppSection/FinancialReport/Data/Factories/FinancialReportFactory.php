<?php

namespace App\Containers\AppSection\FinancialReport\Data\Factories;

use App\Containers\AppSection\FinancialReport\Models\FinancialReport;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class FinancialReportFactory extends ParentFactory
{
    protected $model = FinancialReport::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
