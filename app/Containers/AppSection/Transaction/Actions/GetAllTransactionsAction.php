<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Transaction\Tasks\GetAllTransactionsTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetAllTransactionsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTransactionsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllTransactionsRequest $request): mixed
    {
        return app(GetAllTransactionsTask::class)->run();
    }
}
