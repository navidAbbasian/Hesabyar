<?php

namespace App\Containers\AppSection\Fund\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\Fund\Events\FundsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFundsTask extends ParentTask
{
    public function __construct(
        protected FundRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        FundsListedEvent::dispatch($result);

        return $result;
    }
}
