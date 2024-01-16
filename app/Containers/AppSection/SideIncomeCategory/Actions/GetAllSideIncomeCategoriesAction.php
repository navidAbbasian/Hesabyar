<?php

namespace App\Containers\AppSection\SideIncomeCategory\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideIncomeCategory\Tasks\GetAllSideIncomeCategoriesTask;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\GetAllSideIncomeCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideIncomeCategoriesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSideIncomeCategoriesRequest $request): mixed
    {
        return app(GetAllSideIncomeCategoriesTask::class)->run();
    }
}
