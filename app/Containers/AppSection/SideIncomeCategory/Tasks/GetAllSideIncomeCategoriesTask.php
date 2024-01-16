<?php

namespace App\Containers\AppSection\SideIncomeCategory\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideIncomeCategory\Data\Repositories\SideIncomeCategoryRepository;
use App\Containers\AppSection\SideIncomeCategory\Events\SideIncomeCategoriesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideIncomeCategoriesTask extends ParentTask
{
    public function __construct(
        protected SideIncomeCategoryRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        SideIncomeCategoriesListedEvent::dispatch($result);

        return $result;
    }
}
