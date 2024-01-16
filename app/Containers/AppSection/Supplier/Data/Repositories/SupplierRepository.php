<?php

namespace App\Containers\AppSection\Supplier\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SupplierRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
