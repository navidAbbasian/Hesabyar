<?php

namespace App\Containers\AppSection\Bank\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Bank\Tasks\GetAllBanksTask;
use App\Containers\AppSection\Bank\UI\API\Requests\GetAllBanksRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBanksAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBanksRequest $request): mixed
    {
        return app(GetAllBanksTask::class)->run();
    }
}
