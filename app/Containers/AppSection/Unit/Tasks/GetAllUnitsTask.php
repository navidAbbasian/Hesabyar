<?php

namespace App\Containers\AppSection\Unit\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Unit\Data\Repositories\UnitRepository;
use App\Containers\AppSection\Unit\Events\UnitsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUnitsTask extends ParentTask
{
    public function __construct(
        protected UnitRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        UnitsListedEvent::dispatch($result);

        return $result;
    }
}
