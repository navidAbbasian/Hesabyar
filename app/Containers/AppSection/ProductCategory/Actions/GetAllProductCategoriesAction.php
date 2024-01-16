<?php

namespace App\Containers\AppSection\ProductCategory\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductCategory\Tasks\GetAllProductCategoriesTask;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\GetAllProductCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductCategoriesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllProductCategoriesRequest $request): mixed
    {
        return app(GetAllProductCategoriesTask::class)->run();
    }
}
