<?php

namespace App\Containers\AppSection\SellProductFactor\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SellProductFactorRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'person.name' => 'like',
        'person.family' => 'like',
        // ...
    ];
}
