<?php

namespace App\Containers\AppSection\Unit\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UnitRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'unit' => 'like',
        // ...
    ];
}
