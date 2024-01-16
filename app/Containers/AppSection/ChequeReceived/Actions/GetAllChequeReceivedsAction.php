<?php

namespace App\Containers\AppSection\ChequeReceived\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChequeReceived\Tasks\GetAllChequeReceivedsTask;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\GetAllChequeReceivedsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllChequeReceivedsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllChequeReceivedsRequest $request): mixed
    {
        return app(GetAllChequeReceivedsTask::class)->run();
    }
}
