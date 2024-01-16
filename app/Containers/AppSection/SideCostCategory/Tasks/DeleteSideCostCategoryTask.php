<?php

namespace App\Containers\AppSection\SideCostCategory\Tasks;

use App\Containers\AppSection\SideCostCategory\Data\Repositories\SideCostCategoryRepository;
use App\Containers\AppSection\SideCostCategory\Events\SideCostCategoryDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteSideCostCategoryTask extends ParentTask
{
    public function __construct(
        protected SideCostCategoryRepository $repository
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
            SideCostCategoryDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
