<?php

namespace App\Containers\AppSection\Transaction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TransactionRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type' => 'like',
        // ...
    ];
}
