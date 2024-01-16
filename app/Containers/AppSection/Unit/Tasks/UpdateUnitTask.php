<?php

namespace App\Containers\AppSection\Unit\Tasks;

use App\Containers\AppSection\Unit\Data\Repositories\UnitRepository;
use App\Containers\AppSection\Unit\Events\UnitUpdatedEvent;
use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateUnitTask extends ParentTask
{
    public function __construct(
        protected UnitRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Unit
    {
        try {
            $unit = $this->repository->update($data, $id);
            UnitUpdatedEvent::dispatch($unit);

            return $unit;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
