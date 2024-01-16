<?php

namespace App\Containers\AppSection\ProductCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Containers\AppSection\ProductCategory\Tasks\CreateProductCategoryTask;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\CreateProductCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductCategoryAction extends ParentAction
{
    /**
     * @param CreateProductCategoryRequest $request
     * @return ProductCategory
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateProductCategoryRequest $request): ProductCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'description'
        ]);

        return app(CreateProductCategoryTask::class)->run($data);
    }
}
