<?php

namespace App\Containers\AppSection\SideIncomeCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Containers\AppSection\SideIncomeCategory\Tasks\UpdateSideIncomeCategoryTask;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\UpdateSideIncomeCategoryRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSideIncomeCategoryAction extends ParentAction
{
    /**
     * @param UpdateSideIncomeCategoryRequest $request
     * @return SideIncomeCategory
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSideIncomeCategoryRequest $request): SideIncomeCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(UpdateSideIncomeCategoryTask::class)->run($data, $request->id);
    }
}
