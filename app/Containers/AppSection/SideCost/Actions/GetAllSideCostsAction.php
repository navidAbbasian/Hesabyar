<?php

namespace App\Containers\AppSection\SideCost\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SideCost\Tasks\GetAllSideCostsTask;
use App\Containers\AppSection\SideCost\UI\API\Requests\GetAllSideCostsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSideCostsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSideCostsRequest $request): mixed
    {
        return app(GetAllSideCostsTask::class)->run();
    }
}
