<?php

namespace App\Containers\AppSection\Dashboard\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class DashboardRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
