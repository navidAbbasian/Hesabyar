<?php

namespace App\Containers\AppSection\SideIncomeCategory\Actions;

use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Containers\AppSection\SideIncomeCategory\Tasks\FindSideIncomeCategoryByIdTask;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\FindSideIncomeCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSideIncomeCategoryByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSideIncomeCategoryByIdRequest $request): SideIncomeCategory
    {
        return app(FindSideIncomeCategoryByIdTask::class)->run($request->id);
    }
}
