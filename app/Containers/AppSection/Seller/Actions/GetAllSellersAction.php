<?php

namespace App\Containers\AppSection\Seller\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Seller\Tasks\GetAllSellersTask;
use App\Containers\AppSection\Seller\UI\API\Requests\GetAllSellersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSellersRequest $request): mixed
    {
        return app(GetAllSellersTask::class)->run($request);
    }
}
