<?php

namespace App\Containers\AppSection\Company\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Company\Tasks\GetAllCompaniesTask;
use App\Containers\AppSection\Company\UI\API\Requests\GetAllCompaniesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCompaniesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCompaniesRequest $request): mixed
    {
        return app(GetAllCompaniesTask::class)->run();
    }
}
