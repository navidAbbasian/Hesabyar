<?php

namespace App\Containers\AppSection\ProductCategory\Actions;

use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Containers\AppSection\ProductCategory\Tasks\FindProductCategoryByIdTask;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\FindProductCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductCategoryByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindProductCategoryByIdRequest $request): ProductCategory
    {
        return app(FindProductCategoryByIdTask::class)->run($request->id);
    }
}
