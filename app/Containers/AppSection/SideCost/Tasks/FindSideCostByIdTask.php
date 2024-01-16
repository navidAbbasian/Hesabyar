<?php

namespace App\Containers\AppSection\SideCost\Tasks;

use App\Containers\AppSection\SideCost\Data\Repositories\SideCostRepository;
use App\Containers\AppSection\SideCost\Events\SideCostFoundByIdEvent;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSideCostByIdTask extends ParentTask
{
    public function __construct(
        protected SideCostRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): SideCost
    {
        try {
            $sidecost = $this->repository->withTrashed()->find($id);
            SideCostFoundByIdEvent::dispatch($sidecost);

            return $sidecost;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
