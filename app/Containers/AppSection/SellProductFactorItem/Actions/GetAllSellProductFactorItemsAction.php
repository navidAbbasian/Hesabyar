<?php

namespace App\Containers\AppSection\SellProductFactorItem\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SellProductFactorItem\Tasks\GetAllSellProductFactorItemsTask;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\GetAllSellProductFactorItemsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellProductFactorItemsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSellProductFactorItemsRequest $request): mixed
    {
        return app(GetAllSellProductFactorItemsTask::class)->run();
    }
}
