<?php

namespace App\Containers\AppSection\ProductCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ProductCategory\Actions\CreateProductCategoryAction;
use App\Containers\AppSection\ProductCategory\Actions\DeleteProductCategoryAction;
use App\Containers\AppSection\ProductCategory\Actions\FindProductCategoryByIdAction;
use App\Containers\AppSection\ProductCategory\Actions\GetAllProductCategoriesAction;
use App\Containers\AppSection\ProductCategory\Actions\UpdateProductCategoryAction;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\CreateProductCategoryRequest;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\DeleteProductCategoryRequest;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\FindProductCategoryByIdRequest;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\GetAllProductCategoriesRequest;
use App\Containers\AppSection\ProductCategory\UI\API\Requests\UpdateProductCategoryRequest;
use App\Containers\AppSection\ProductCategory\UI\API\Transformers\ProductCategoryTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param CreateProductCategoryRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createProductCategory(CreateProductCategoryRequest $request): JsonResponse
    {
        $productcategory = app(CreateProductCategoryAction::class)->run($request);

        return $this->created($this->transform($productcategory, ProductCategoryTransformer::class));
    }

    /**
     * @param FindProductCategoryByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findProductCategoryById(FindProductCategoryByIdRequest $request): array
    {
        $productcategory = app(FindProductCategoryByIdAction::class)->run($request);

        return $this->transform($productcategory, ProductCategoryTransformer::class);
    }

    /**
     * @param GetAllProductCategoriesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllProductCategories(GetAllProductCategoriesRequest $request): array
    {
        $productcategories = app(GetAllProductCategoriesAction::class)->run($request);

        return $this->transform($productcategories, ProductCategoryTransformer::class);
    }

    /**
     * @param UpdateProductCategoryRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateProductCategory(UpdateProductCategoryRequest $request): array
    {
        $productcategory = app(UpdateProductCategoryAction::class)->run($request);

        return $this->transform($productcategory, ProductCategoryTransformer::class);
    }

    /**
     * @param DeleteProductCategoryRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteProductCategory(DeleteProductCategoryRequest $request): JsonResponse
    {
        app(DeleteProductCategoryAction::class)->run($request);

        return $this->noContent();
    }
}
