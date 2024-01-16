<?php

namespace App\Containers\AppSection\SideIncome\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideIncome\Tasks\GetAllSideIncomesTask;
use App\Containers\AppSection\SideIncome\UI\API\Requests\GetAllSideIncomesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideIncomesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSideIncomesRequest $request): mixed
    {
        return app(GetAllSideIncomesTask::class)->run();
    }
}
