<?php

namespace App\Containers\AppSection\SideIncomeCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SideIncomeCategoryRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
