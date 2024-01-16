<?php

namespace App\Containers\AppSection\SideCost\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SideCostRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title' => 'like',
        // ...
    ];
}
