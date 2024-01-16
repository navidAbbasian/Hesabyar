<?php

namespace App\Containers\AppSection\Person\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Person\Tasks\GetAllPeopleTask;
use App\Containers\AppSection\Person\UI\API\Requests\GetAllPeopleRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPeopleAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllPeopleRequest $request): mixed
    {
        return app(GetAllPeopleTask::class)->run();
    }
}
