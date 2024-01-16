<?php

namespace App\Containers\AppSection\Unit\Actions;

use App\Containers\AppSection\Unit\Tasks\DeleteUnitTask;
use App\Containers\AppSection\Unit\UI\API\Requests\DeleteUnitRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteUnitAction extends ParentAction
{
    /**
     * @param DeleteUnitRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteUnitRequest $request): int
    {
        return app(DeleteUnitTask::class)->run($request->id);
    }
}
