<?php

namespace App\Containers\AppSection\Unit\Actions;

use App\Containers\AppSection\Unit\Models\Unit;
use App\Containers\AppSection\Unit\Tasks\FindUnitByIdTask;
use App\Containers\AppSection\Unit\UI\API\Requests\FindUnitByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindUnitByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindUnitByIdRequest $request): Unit
    {
        return app(FindUnitByIdTask::class)->run($request->id);
    }
}
