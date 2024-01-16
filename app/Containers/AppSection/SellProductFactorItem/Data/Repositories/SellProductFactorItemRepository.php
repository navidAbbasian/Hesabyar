<?php

namespace App\Containers\AppSection\SellProductFactorItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SellProductFactorItemRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
