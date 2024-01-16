<?php

namespace App\Containers\AppSection\PersonCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\PersonCategory\Actions\CreatePersonCategoryAction;
use App\Containers\AppSection\PersonCategory\Actions\DeletePersonCategoryAction;
use App\Containers\AppSection\PersonCategory\Actions\FindPersonCategoryByIdAction;
use App\Containers\AppSection\PersonCategory\Actions\GetAllPersonCategoriesAction;
use App\Containers\AppSection\PersonCategory\Actions\UpdatePersonCategoryAction;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\CreatePersonCategoryRequest;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\DeletePersonCategoryRequest;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\FindPersonCategoryByIdRequest;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\GetAllPersonCategoriesRequest;
use App\Containers\AppSection\PersonCategory\UI\API\Requests\UpdatePersonCategoryRequest;
use App\Containers\AppSection\PersonCategory\UI\API\Transformers\PersonCategoryTransformer;
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
     * @param CreatePersonCategoryRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createPersonCategory(CreatePersonCategoryRequest $request): JsonResponse
    {
        $personcategory = app(CreatePersonCategoryAction::class)->run($request);

        return $this->created($this->transform($personcategory, PersonCategoryTransformer::class));
    }

    /**
     * @param FindPersonCategoryByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findPersonCategoryById(FindPersonCategoryByIdRequest $request): array
    {
        $personcategory = app(FindPersonCategoryByIdAction::class)->run($request);

        return $this->transform($personcategory, PersonCategoryTransformer::class);
    }

    /**
     * @param GetAllPersonCategoriesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllPersonCategories(GetAllPersonCategoriesRequest $request): array
    {
        $personcategories = app(GetAllPersonCategoriesAction::class)->run($request);

        return $this->transform($personcategories, PersonCategoryTransformer::class);
    }

    /**
     * @param UpdatePersonCategoryRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updatePersonCategory(UpdatePersonCategoryRequest $request): array
    {
        $personcategory = app(UpdatePersonCategoryAction::class)->run($request);

        return $this->transform($personcategory, PersonCategoryTransformer::class);
    }

    /**
     * @param DeletePersonCategoryRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deletePersonCategory(DeletePersonCategoryRequest $request): JsonResponse
    {
        app(DeletePersonCategoryAction::class)->run($request);

        return $this->noContent();
    }
}
