<?php

namespace App\Containers\AppSection\Company\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CompanyRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
