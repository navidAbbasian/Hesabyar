<?php

namespace App\Containers\AppSection\SideIncomeCategory\Actions;

use App\Containers\AppSection\SideIncomeCategory\Tasks\DeleteSideIncomeCategoryTask;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\DeleteSideIncomeCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSideIncomeCategoryAction extends ParentAction
{
    /**
     * @param DeleteSideIncomeCategoryRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSideIncomeCategoryRequest $request): int
    {
        return app(DeleteSideIncomeCategoryTask::class)->run($request->id);
    }
}
