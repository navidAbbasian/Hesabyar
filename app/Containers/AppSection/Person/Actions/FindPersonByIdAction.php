<?php

namespace App\Containers\AppSection\Person\Actions;

use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Person\Tasks\FindPersonByIdTask;
use App\Containers\AppSection\Person\UI\API\Requests\FindPersonByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPersonByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindPersonByIdRequest $request): Person
    {
        return app(FindPersonByIdTask::class)->run($request->id);
    }
}
