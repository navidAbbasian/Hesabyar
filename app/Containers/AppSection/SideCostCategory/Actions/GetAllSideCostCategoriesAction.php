<?php

namespace App\Containers\AppSection\SideCostCategory\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideCostCategory\Tasks\GetAllSideCostCategoriesTask;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\GetAllSideCostCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideCostCategoriesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSideCostCategoriesRequest $request): mixed
    {
        return app(GetAllSideCostCategoriesTask::class)->run();
    }
}
