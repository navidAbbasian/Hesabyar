<?php

namespace App\Containers\AppSection\BankNameList\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BankNameListRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
