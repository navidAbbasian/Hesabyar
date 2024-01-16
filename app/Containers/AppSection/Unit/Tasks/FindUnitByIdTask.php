<?php

namespace App\Containers\AppSection\Unit\Tasks;

use App\Containers\AppSection\Unit\Data\Repositories\UnitRepository;
use App\Containers\AppSection\Unit\Events\UnitFoundByIdEvent;
use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindUnitByIdTask extends ParentTask
{
    public function __construct(
        protected UnitRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Unit
    {
        try {
            $unit = $this->repository->withTrashed()->find($id);
            UnitFoundByIdEvent::dispatch($unit);

            return $unit;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
