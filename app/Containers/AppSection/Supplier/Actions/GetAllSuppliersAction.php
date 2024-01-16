<?php

namespace App\Containers\AppSection\Supplier\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Supplier\Tasks\GetAllSuppliersTask;
use App\Containers\AppSection\Supplier\UI\API\Requests\GetAllSuppliersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSuppliersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSuppliersRequest $request): mixed
    {
        return app(GetAllSuppliersTask::class)->run();
    }
}
