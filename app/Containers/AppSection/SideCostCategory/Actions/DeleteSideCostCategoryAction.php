<?php

namespace App\Containers\AppSection\SideCostCategory\Actions;

use App\Containers\AppSection\SideCostCategory\Tasks\DeleteSideCostCategoryTask;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\DeleteSideCostCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSideCostCategoryAction extends ParentAction
{
    /**
     * @param DeleteSideCostCategoryRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSideCostCategoryRequest $request): int
    {
        return app(DeleteSideCostCategoryTask::class)->run($request->id);
    }
}
