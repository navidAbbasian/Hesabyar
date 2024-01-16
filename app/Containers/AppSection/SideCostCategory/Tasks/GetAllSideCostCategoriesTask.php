<?php

namespace App\Containers\AppSection\SideCostCategory\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideCostCategory\Data\Repositories\SideCostCategoryRepository;
use App\Containers\AppSection\SideCostCategory\Events\SideCostCategoriesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideCostCategoriesTask extends ParentTask
{
    public function __construct(
        protected SideCostCategoryRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        SideCostCategoriesListedEvent::dispatch($result);

        return $result;
    }
}
