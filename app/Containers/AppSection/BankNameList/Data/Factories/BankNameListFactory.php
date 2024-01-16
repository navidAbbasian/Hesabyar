<?php

namespace App\Containers\AppSection\BankNameList\Data\Factories;

use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BankNameListFactory extends ParentFactory
{
    protected $model = BankNameList::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
