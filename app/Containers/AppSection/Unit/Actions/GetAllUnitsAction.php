<?php

namespace App\Containers\AppSection\Unit\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Unit\Tasks\GetAllUnitsTask;
use App\Containers\AppSection\Unit\UI\API\Requests\GetAllUnitsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUnitsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllUnitsRequest $request): mixed
    {
        return app(GetAllUnitsTask::class)->run();
    }
}
