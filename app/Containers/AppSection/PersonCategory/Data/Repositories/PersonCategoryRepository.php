<?php

namespace App\Containers\AppSection\PersonCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PersonCategoryRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
