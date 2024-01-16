<?php

namespace App\Containers\AppSection\ProductCategory\Tasks;

use App\Containers\AppSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Containers\AppSection\ProductCategory\Events\ProductCategoryFoundByIdEvent;
use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindProductCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected ProductCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ProductCategory
    {
        try {
            $productcategory = $this->repository->withTrashed()->find($id);
            ProductCategoryFoundByIdEvent::dispatch($productcategory);

            return $productcategory;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
