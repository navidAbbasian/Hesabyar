<?php

namespace App\Containers\AppSection\SideCostCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Containers\AppSection\SideCostCategory\Tasks\UpdateSideCostCategoryTask;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\UpdateSideCostCategoryRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSideCostCategoryAction extends ParentAction
{
    /**
     * @param UpdateSideCostCategoryRequest $request
     * @return SideCostCategory
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSideCostCategoryRequest $request): SideCostCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(UpdateSideCostCategoryTask::class)->run($data, $request->id);
    }
}
