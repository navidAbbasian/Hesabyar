<?php

namespace App\Containers\AppSection\Stockholder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class StockholderRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'family' => 'like',
        // ...
    ];
}
