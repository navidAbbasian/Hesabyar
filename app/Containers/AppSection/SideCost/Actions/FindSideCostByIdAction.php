<?php

namespace App\Containers\AppSection\SideCost\Actions;

use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideCost\Tasks\FindSideCostByIdTask;
use App\Containers\AppSection\SideCost\UI\API\Requests\FindSideCostByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSideCostByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSideCostByIdRequest $request): SideCost
    {
        return app(FindSideCostByIdTask::class)->run($request->id);
    }
}
