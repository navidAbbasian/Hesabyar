<?php

namespace App\Containers\AppSection\Person\Actions;

use App\Containers\AppSection\Person\Tasks\DeletePersonTask;
use App\Containers\AppSection\Person\UI\API\Requests\DeletePersonRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeletePersonAction extends ParentAction
{
    /**
     * @param DeletePersonRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeletePersonRequest $request): int
    {
        return app(DeletePersonTask::class)->run($request->id);
    }
}
