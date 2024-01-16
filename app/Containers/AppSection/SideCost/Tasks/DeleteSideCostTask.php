<?php

namespace App\Containers\AppSection\SideCost\Tasks;

use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SideCost\Data\Repositories\SideCostRepository;
use App\Containers\AppSection\SideCost\Events\SideCostDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteSideCostTask extends ParentTask
{
    public function __construct(
        protected SideCostRepository $repository
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
            SideCostDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
