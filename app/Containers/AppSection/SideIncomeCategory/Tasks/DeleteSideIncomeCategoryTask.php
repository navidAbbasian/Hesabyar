<?php

namespace App\Containers\AppSection\SideIncomeCategory\Tasks;

use App\Containers\AppSection\SideIncomeCategory\Data\Repositories\SideIncomeCategoryRepository;
use App\Containers\AppSection\SideIncomeCategory\Events\SideIncomeCategoryDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteSideIncomeCategoryTask extends ParentTask
{
    public function __construct(
        protected SideIncomeCategoryRepository $repository
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
            SideIncomeCategoryDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
