<?php

namespace App\Containers\AppSection\SideIncomeCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Containers\AppSection\SideIncomeCategory\Tasks\CreateSideIncomeCategoryTask;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\CreateSideIncomeCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSideIncomeCategoryAction extends ParentAction
{
    /**
     * @param CreateSideIncomeCategoryRequest $request
     * @return SideIncomeCategory
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSideIncomeCategoryRequest $request): SideIncomeCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(CreateSideIncomeCategoryTask::class)->run($data);
    }
}
