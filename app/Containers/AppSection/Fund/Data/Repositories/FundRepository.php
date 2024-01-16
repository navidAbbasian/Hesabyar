<?php

namespace App\Containers\AppSection\Fund\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FundRepository extends ParentRepository
{
    /**
     * @var array
     */

    protected $fieldSearchable = [
        'title' => 'like',
        // ...
    ];
}
