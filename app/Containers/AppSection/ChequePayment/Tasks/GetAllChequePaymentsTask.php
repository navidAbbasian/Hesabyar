<?php

namespace App\Containers\AppSection\ChequePayment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequePayment\Events\ChequePaymentsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllChequePaymentsTask extends ParentTask
{
    public function __construct(
        protected ChequePaymentRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        ChequePaymentsListedEvent::dispatch($result);

        return $result;
    }
}
