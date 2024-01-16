<?php

namespace App\Containers\AppSection\ProductCategory\Tasks;

use App\Containers\AppSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Containers\AppSection\ProductCategory\Events\ProductCategoryCreatedEvent;
use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProductCategoryTask extends ParentTask
{
    public function __construct(
        protected ProductCategoryRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ProductCategory
    {
        try {
            $productcategory = $this->repository->create($data);
            ProductCategoryCreatedEvent::dispatch($productcategory);

            return $productcategory;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
