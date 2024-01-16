<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BuyProductFactorReverseRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
