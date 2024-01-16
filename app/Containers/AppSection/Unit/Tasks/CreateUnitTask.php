<?php

namespace App\Containers\AppSection\Unit\Tasks;

use App\Containers\AppSection\Unit\Data\Repositories\UnitRepository;
use App\Containers\AppSection\Unit\Events\UnitCreatedEvent;
use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateUnitTask extends ParentTask
{
    public function __construct(
        protected UnitRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Unit
    {
        try {
            $unit = $this->repository->create($data);
            UnitCreatedEvent::dispatch($unit);

            return $unit;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
