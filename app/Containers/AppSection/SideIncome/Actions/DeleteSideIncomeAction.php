<?php

namespace App\Containers\AppSection\SideIncome\Actions;

use App\Containers\AppSection\SideIncome\Tasks\DeleteSideIncomeTask;
use App\Containers\AppSection\SideIncome\UI\API\Requests\DeleteSideIncomeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSideIncomeAction extends ParentAction
{
    /**
     * @param DeleteSideIncomeRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSideIncomeRequest $request): int
    {
        return app(DeleteSideIncomeTask::class)->run($request->id);
    }
}
