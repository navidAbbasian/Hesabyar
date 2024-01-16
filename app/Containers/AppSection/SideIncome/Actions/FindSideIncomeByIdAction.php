<?php

namespace App\Containers\AppSection\SideIncome\Actions;

use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\SideIncome\Tasks\FindSideIncomeByIdTask;
use App\Containers\AppSection\SideIncome\UI\API\Requests\FindSideIncomeByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSideIncomeByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSideIncomeByIdRequest $request): SideIncome
    {
        return app(FindSideIncomeByIdTask::class)->run($request->id);
    }
}
