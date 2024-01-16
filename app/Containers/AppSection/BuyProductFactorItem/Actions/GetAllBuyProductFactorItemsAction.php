<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BuyProductFactorItem\Tasks\GetAllBuyProductFactorItemsTask;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\GetAllBuyProductFactorItemsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBuyProductFactorItemsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBuyProductFactorItemsRequest $request): mixed
    {
        return app(GetAllBuyProductFactorItemsTask::class)->run();
    }
}
