<?php

namespace App\Containers\AppSection\Bank\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\Bank\Events\BanksListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBanksTask extends ParentTask
{
    public function __construct(
        protected BankRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        BanksListedEvent::dispatch($result);

        return $result;
    }
}
