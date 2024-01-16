<?php

namespace App\Containers\AppSection\SideCostCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SideCostCategoryRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
