<?php

namespace App\Containers\AppSection\SideCostCategory\Actions;

use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Containers\AppSection\SideCostCategory\Tasks\FindSideCostCategoryByIdTask;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\FindSideCostCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSideCostCategoryByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSideCostCategoryByIdRequest $request): SideCostCategory
    {
        return app(FindSideCostCategoryByIdTask::class)->run($request->id);
    }
}
