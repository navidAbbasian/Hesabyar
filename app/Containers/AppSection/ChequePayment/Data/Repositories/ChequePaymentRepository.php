<?php

namespace App\Containers\AppSection\ChequePayment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChequePaymentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status' => 'like',
        // ...
    ];
}
