<?php

namespace App\Containers\AppSection\ChequeReceived\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChequeReceivedRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status' => 'like',
        // ...
    ];
}
