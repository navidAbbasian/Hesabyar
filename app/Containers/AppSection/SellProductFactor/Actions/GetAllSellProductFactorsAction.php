<?php

namespace App\Containers\AppSection\SellProductFactor\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SellProductFactor\Tasks\GetAllSellProductFactorsTask;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\GetAllSellProductFactorsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellProductFactorsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSellProductFactorsRequest $request): mixed
    {
        return app(GetAllSellProductFactorsTask::class)->run();
    }
}
