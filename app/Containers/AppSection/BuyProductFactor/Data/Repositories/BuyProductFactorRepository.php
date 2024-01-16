<?php

namespace App\Containers\AppSection\BuyProductFactor\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BuyProductFactorRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'person.name' => 'like',
        'person.family' => 'like',
    ];
}
