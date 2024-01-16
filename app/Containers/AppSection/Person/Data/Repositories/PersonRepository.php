<?php

namespace App\Containers\AppSection\Person\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PersonRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'family' => 'like',
        // ...
    ];
}
