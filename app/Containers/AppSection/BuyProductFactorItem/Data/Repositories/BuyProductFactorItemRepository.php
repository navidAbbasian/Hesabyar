<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BuyProductFactorItemRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
