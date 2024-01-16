<?php

namespace App\Containers\AppSection\ProductCategory\Tasks;

use App\Containers\AppSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Containers\AppSection\ProductCategory\Events\ProductCategoryDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteProductCategoryTask extends ParentTask
{
    public function __construct(
        protected ProductCategoryRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            ProductCategoryDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
