<?php

namespace App\Containers\AppSection\PersonCategory\Tasks;

use App\Containers\AppSection\PersonCategory\Data\Repositories\PersonCategoryRepository;
use App\Containers\AppSection\PersonCategory\Events\PersonCategoryDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeletePersonCategoryTask extends ParentTask
{
    public function __construct(
        protected PersonCategoryRepository $repository
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
            PersonCategoryDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
