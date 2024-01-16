<?php

namespace App\Containers\AppSection\Bank\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BankRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
