<?php

namespace App\Containers\AppSection\ProductCategory\Tasks;

use App\Containers\AppSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Containers\AppSection\ProductCategory\Events\ProductCategoryUpdatedEvent;
use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateProductCategoryTask extends ParentTask
{
    public function __construct(
        protected ProductCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ProductCategory
    {
        try {
            $productcategory = $this->repository->update($data, $id);
            ProductCategoryUpdatedEvent::dispatch($productcategory);

            return $productcategory;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
