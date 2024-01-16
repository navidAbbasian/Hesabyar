<?php

namespace App\Containers\AppSection\PersonCategory\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\PersonCategory\Data\Repositories\PersonCategoryRepository;
use App\Containers\AppSection\PersonCategory\Events\PersonCategoriesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPersonCategoriesTask extends ParentTask
{
    public function __construct(
        protected PersonCategoryRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        PersonCategoriesListedEvent::dispatch($result);

        return $result;
    }
}
