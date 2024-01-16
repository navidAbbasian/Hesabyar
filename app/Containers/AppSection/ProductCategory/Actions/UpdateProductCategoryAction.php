<?php

namespace App\Containers\AppSection\ProductCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Containers\AppSection\ProductCategory\Tasks\UpdateProductCategoryTask;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\UpdateProductCategoryRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateProductCategoryAction extends ParentAction
{
    /**
     * @param UpdateProductCategoryRequest $request
     * @return ProductCategory
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateProductCategoryRequest $request): ProductCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(UpdateProductCategoryTask::class)->run($data, $request->id);
    }
}
