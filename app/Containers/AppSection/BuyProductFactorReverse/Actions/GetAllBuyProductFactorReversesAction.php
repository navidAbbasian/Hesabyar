<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BuyProductFactorReverse\Tasks\GetAllBuyProductFactorReversesTask;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\GetAllBuyProductFactorReversesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBuyProductFactorReversesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBuyProductFactorReversesRequest $request): mixed
    {
        return app(GetAllBuyProductFactorReversesTask::class)->run();
    }
}
