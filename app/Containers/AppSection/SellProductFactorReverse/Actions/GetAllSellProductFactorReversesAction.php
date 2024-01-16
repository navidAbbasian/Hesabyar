<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SellProductFactorReverse\Tasks\GetAllSellProductFactorReversesTask;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\GetAllSellProductFactorReversesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellProductFactorReversesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSellProductFactorReversesRequest $request): mixed
    {
        return app(GetAllSellProductFactorReversesTask::class)->run();
    }
}
