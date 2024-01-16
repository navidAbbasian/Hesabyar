<?php

namespace App\Containers\AppSection\SideIncomeCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SideIncomeCategory\Actions\CreateSideIncomeCategoryAction;
use App\Containers\AppSection\SideIncomeCategory\Actions\DeleteSideIncomeCategoryAction;
use App\Containers\AppSection\SideIncomeCategory\Actions\FindSideIncomeCategoryByIdAction;
use App\Containers\AppSection\SideIncomeCategory\Actions\GetAllSideIncomeCategoriesAction;
use App\Containers\AppSection\SideIncomeCategory\Actions\UpdateSideIncomeCategoryAction;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\CreateSideIncomeCategoryRequest;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\DeleteSideIncomeCategoryRequest;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\FindSideIncomeCategoryByIdRequest;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\GetAllSideIncomeCategoriesRequest;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Requests\UpdateSideIncomeCategoryRequest;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Transformers\SideIncomeCategoryTransformer;
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
     * @param CreateSideIncomeCategoryRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSideIncomeCategory(CreateSideIncomeCategoryRequest $request): JsonResponse
    {
        $sideincomecategory = app(CreateSideIncomeCategoryAction::class)->run($request);

        return $this->created($this->transform($sideincomecategory, SideIncomeCategoryTransformer::class));
    }

    /**
     * @param FindSideIncomeCategoryByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSideIncomeCategoryById(FindSideIncomeCategoryByIdRequest $request): array
    {
        $sideincomecategory = app(FindSideIncomeCategoryByIdAction::class)->run($request);

        return $this->transform($sideincomecategory, SideIncomeCategoryTransformer::class);
    }

    /**
     * @param GetAllSideIncomeCategoriesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSideIncomeCategories(GetAllSideIncomeCategoriesRequest $request): array
    {
        $sideincomecategories = app(GetAllSideIncomeCategoriesAction::class)->run($request);

        return $this->transform($sideincomecategories, SideIncomeCategoryTransformer::class);
    }

    /**
     * @param UpdateSideIncomeCategoryRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSideIncomeCategory(UpdateSideIncomeCategoryRequest $request): array
    {
        $sideincomecategory = app(UpdateSideIncomeCategoryAction::class)->run($request);

        return $this->transform($sideincomecategory, SideIncomeCategoryTransformer::class);
    }

    /**
     * @param DeleteSideIncomeCategoryRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSideIncomeCategory(DeleteSideIncomeCategoryRequest $request): JsonResponse
    {
        app(DeleteSideIncomeCategoryAction::class)->run($request);

        return $this->noContent();
    }
}
