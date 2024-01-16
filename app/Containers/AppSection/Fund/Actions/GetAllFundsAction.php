<?php

namespace App\Containers\AppSection\Fund\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Fund\Tasks\GetAllFundsTask;
use App\Containers\AppSection\Fund\UI\API\Requests\GetAllFundsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFundsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllFundsRequest $request): mixed
    {
        return app(GetAllFundsTask::class)->run();
    }
}
