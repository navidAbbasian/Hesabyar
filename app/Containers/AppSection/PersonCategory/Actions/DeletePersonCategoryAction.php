<?php

namespace App\Containers\AppSection\PersonCategory\Actions;

use App\Containers\AppSection\PersonCategory\Tasks\DeletePersonCategoryTask;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\DeletePersonCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeletePersonCategoryAction extends ParentAction
{
    /**
     * @param DeletePersonCategoryRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeletePersonCategoryRequest $request): int
    {
        return app(DeletePersonCategoryTask::class)->run($request->id);
    }
}
