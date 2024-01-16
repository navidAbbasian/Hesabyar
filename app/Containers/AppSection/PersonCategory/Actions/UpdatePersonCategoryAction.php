<?php

namespace App\Containers\AppSection\PersonCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Containers\AppSection\PersonCategory\Tasks\UpdatePersonCategoryTask;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\UpdatePersonCategoryRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdatePersonCategoryAction extends ParentAction
{
    /**
     * @param UpdatePersonCategoryRequest $request
     * @return PersonCategory
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePersonCategoryRequest $request): PersonCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(UpdatePersonCategoryTask::class)->run($data, $request->id);
    }
}
