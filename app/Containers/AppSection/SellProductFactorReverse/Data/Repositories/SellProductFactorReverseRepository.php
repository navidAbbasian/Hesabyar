<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SellProductFactorReverseRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
