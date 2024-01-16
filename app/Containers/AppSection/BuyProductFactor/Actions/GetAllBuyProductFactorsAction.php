<?php

namespace App\Containers\AppSection\BuyProductFactor\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BuyProductFactor\Tasks\GetAllBuyProductFactorsTask;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\GetAllBuyProductFactorsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBuyProductFactorsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBuyProductFactorsRequest $request): mixed
    {
        return app(GetAllBuyProductFactorsTask::class)->run();
    }
}
