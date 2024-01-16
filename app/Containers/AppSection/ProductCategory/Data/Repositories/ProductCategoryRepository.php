<?php

namespace App\Containers\AppSection\ProductCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ProductCategoryRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];
}
