<?php

namespace App\Containers\AppSection\PersonCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Containers\AppSection\PersonCategory\Tasks\CreatePersonCategoryTask;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\CreatePersonCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreatePersonCategoryAction extends ParentAction
{
    /**
     * @param CreatePersonCategoryRequest $request
     * @return PersonCategory
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreatePersonCategoryRequest $request): PersonCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(CreatePersonCategoryTask::class)->run($data);
    }
}
