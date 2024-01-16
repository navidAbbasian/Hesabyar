<?php

namespace App\Containers\AppSection\SideIncome\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SideIncomeRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title' => 'like',
        // ...
    ];
}
