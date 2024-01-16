<?php

namespace App\Containers\AppSection\PersonCategory\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\PersonCategory\Tasks\GetAllPersonCategoriesTask;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\GetAllPersonCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPersonCategoriesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllPersonCategoriesRequest $request): mixed
    {
        return app(GetAllPersonCategoriesTask::class)->run();
    }
}
