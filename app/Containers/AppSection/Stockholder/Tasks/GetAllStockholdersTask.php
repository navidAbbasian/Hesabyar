<?php

namespace App\Containers\AppSection\Stockholder\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Stockholder\Data\Repositories\StockholderRepository;
use App\Containers\AppSection\Stockholder\Events\StockholdersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllStockholdersTask extends ParentTask
{
    public function __construct(
        protected StockholderRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        StockholdersListedEvent::dispatch($result);

        return $result;
    }
}
