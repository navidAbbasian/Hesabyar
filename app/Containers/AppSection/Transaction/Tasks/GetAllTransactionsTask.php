<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Events\TransactionsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTransactionsTask extends ParentTask
{
    public function __construct(
        protected TransactionRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        TransactionsListedEvent::dispatch($result);

        return $result;
    }
}
