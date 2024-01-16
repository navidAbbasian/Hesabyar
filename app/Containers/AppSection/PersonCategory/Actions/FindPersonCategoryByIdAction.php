<?php

namespace App\Containers\AppSection\PersonCategory\Actions;

use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Containers\AppSection\PersonCategory\Tasks\FindPersonCategoryByIdTask;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\FindPersonCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPersonCategoryByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindPersonCategoryByIdRequest $request): PersonCategory
    {
        return app(FindPersonCategoryByIdTask::class)->run($request->id);
    }
}
