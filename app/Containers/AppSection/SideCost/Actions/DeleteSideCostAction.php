<?php

namespace App\Containers\AppSection\SideCost\Actions;

use App\Containers\AppSection\SideCost\Tasks\DeleteSideCostTask;
use App\Containers\AppSection\SideCost\UI\API\Requests\DeleteSideCostRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSideCostAction extends ParentAction
{
    /**
     * @param DeleteSideCostRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSideCostRequest $request): int
    {
        return app(DeleteSideCostTask::class)->run($request->id);
    }
}
