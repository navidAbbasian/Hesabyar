<?php

namespace App\Containers\AppSection\Stockholder\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Stockholder\Tasks\GetAllStockholdersTask;
use App\Containers\AppSection\Stockholder\UI\API\Requests\GetAllStockholdersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllStockholdersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllStockholdersRequest $request): mixed
    {
        return app(GetAllStockholdersTask::class)->run();
    }
}
