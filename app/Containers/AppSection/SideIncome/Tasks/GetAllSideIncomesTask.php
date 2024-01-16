<?php

namespace App\Containers\AppSection\SideIncome\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideIncome\Data\Repositories\SideIncomeRepository;
use App\Containers\AppSection\SideIncome\Events\SideIncomesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideIncomesTask extends ParentTask
{
    public function __construct(
        protected SideIncomeRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        SideIncomesListedEvent::dispatch($result);

        return $result;
    }
}
