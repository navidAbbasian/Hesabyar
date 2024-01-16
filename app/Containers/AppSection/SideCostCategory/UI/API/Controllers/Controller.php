<?php

namespace App\Containers\AppSection\SideCostCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SideCostCategory\Actions\CreateSideCostCategoryAction;
use App\Containers\AppSection\SideCostCategory\Actions\DeleteSideCostCategoryAction;
use App\Containers\AppSection\SideCostCategory\Actions\FindSideCostCategoryByIdAction;
use App\Containers\AppSection\SideCostCategory\Actions\GetAllSideCostCategoriesAction;
use App\Containers\AppSection\SideCostCategory\Actions\UpdateSideCostCategoryAction;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\CreateSideCostCategoryRequest;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\DeleteSideCostCategoryRequest;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\FindSideCostCategoryByIdRequest;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\GetAllSideCostCategoriesRequest;
use App\Containers\AppSection\SideCostCategory\UI\API\Requests\UpdateSideCostCategoryRequest;
use App\Containers\AppSection\SideCostCategory\UI\API\Transformers\SideCostCategoryTransformer;
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
     * @param CreateSideCostCategoryRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSideCostCategory(CreateSideCostCategoryRequest $request): JsonResponse
    {
        $sidecostcategory = app(CreateSideCostCategoryAction::class)->run($request);

        return $this->created($this->transform($sidecostcategory, SideCostCategoryTransformer::class));
    }

    /**
     * @param FindSideCostCategoryByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSideCostCategoryById(FindSideCostCategoryByIdRequest $request): array
    {
        $sidecostcategory = app(FindSideCostCategoryByIdAction::class)->run($request);

        return $this->transform($sidecostcategory, SideCostCategoryTransformer::class);
    }

    /**
     * @param GetAllSideCostCategoriesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSideCostCategories(GetAllSideCostCategoriesRequest $request): array
    {
        $sidecostcategories = app(GetAllSideCostCategoriesAction::class)->run($request);

        return $this->transform($sidecostcategories, SideCostCategoryTransformer::class);
    }

    /**
     * @param UpdateSideCostCategoryRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSideCostCategory(UpdateSideCostCategoryRequest $request): array
    {
        $sidecostcategory = app(UpdateSideCostCategoryAction::class)->run($request);

        return $this->transform($sidecostcategory, SideCostCategoryTransformer::class);
    }

    /**
     * @param DeleteSideCostCategoryRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSideCostCategory(DeleteSideCostCategoryRequest $request): JsonResponse
    {
        app(DeleteSideCostCategoryAction::class)->run($request);

        return $this->noContent();
    }
}
