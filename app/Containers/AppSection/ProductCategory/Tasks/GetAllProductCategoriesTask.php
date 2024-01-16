<?php

namespace App\Containers\AppSection\ProductCategory\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Containers\AppSection\ProductCategory\Events\ProductCategoriesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductCategoriesTask extends ParentTask
{
    public function __construct(
        protected ProductCategoryRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        ProductCategoriesListedEvent::dispatch($result);

        return $result;
    }
}
