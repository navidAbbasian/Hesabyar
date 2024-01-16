<?php

namespace App\Containers\AppSection\FinancialReport\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FinancialReportRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
