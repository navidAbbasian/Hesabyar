<?php

namespace App\Containers\AppSection\SideCostCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Containers\AppSection\SideCostCategory\Tasks\CreateSideCostCategoryTask;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\CreateSideCostCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSideCostCategoryAction extends ParentAction
{
    /**
     * @param CreateSideCostCategoryRequest $request
     * @return SideCostCategory
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSideCostCategoryRequest $request): SideCostCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(CreateSideCostCategoryTask::class)->run($data);
    }
}
