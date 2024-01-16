<?php

namespace App\Containers\AppSection\ProductCategory\Actions;

use App\Containers\AppSection\ProductCategory\Tasks\DeleteProductCategoryTask;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\DeleteProductCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteProductCategoryAction extends ParentAction
{
    /**
     * @param DeleteProductCategoryRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteProductCategoryRequest $request): int
    {
        return app(DeleteProductCategoryTask::class)->run($request->id);
    }
}
