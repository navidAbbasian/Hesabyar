<?php

namespace App\Containers\AppSection\ChequePayment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChequePayment\Tasks\GetAllChequePaymentsTask;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\GetAllChequePaymentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllChequePaymentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllChequePaymentsRequest $request): mixed
    {
        return app(GetAllChequePaymentsTask::class)->run();
    }
}
