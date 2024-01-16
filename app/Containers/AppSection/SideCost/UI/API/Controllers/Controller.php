<?php

namespace App\Containers\AppSection\SideCost\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SideCost\Actions\CreateSideCostAction;
use App\Containers\AppSection\SideCost\Actions\DeleteSideCostAction;
use App\Containers\AppSection\SideCost\Actions\FindSideCostByIdAction;
use App\Containers\AppSection\SideCost\Actions\GetAllSideCostsAction;
use App\Containers\AppSection\SideCost\Actions\UpdateSideCostAction;
use App\Containers\AppSection\SideCost\UI\API\Requests\CreateSideCostRequest;
use App\Containers\AppSection\SideCost\UI\API\Requests\DeleteSideCostRequest;
use App\Containers\AppSection\SideCost\UI\API\Requests\FindSideCostByIdRequest;
use App\Containers\AppSection\SideCost\UI\API\Requests\GetAllSideCostsRequest;
use App\Containers\AppSection\SideCost\UI\API\Requests\UpdateSideCostRequest;
use App\Containers\AppSection\SideCost\UI\API\Transformers\SideCostTransformer;
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
     * @param CreateSideCostRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSideCost(CreateSideCostRequest $request): JsonResponse
    {
        $sidecost = app(CreateSideCostAction::class)->run($request);

        return $this->created($this->transform($sidecost, SideCostTransformer::class));
    }

    /**
     * @param FindSideCostByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSideCostById(FindSideCostByIdRequest $request): array
    {
        $sidecost = app(FindSideCostByIdAction::class)->run($request);

        return $this->transform($sidecost,(new SideCostTransformer())->setDefaultIncludes(['sideCostCategory','person']));
    }

    /**
     * @param GetAllSideCostsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSideCosts(GetAllSideCostsRequest $request): array
    {
        $sidecosts = app(GetAllSideCostsAction::class)->run($request);

        return $this->transform($sidecosts,(new SideCostTransformer())->setDefaultIncludes(['sideCostCategory','person']));
    }

    /**
     * @param UpdateSideCostRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSideCost(UpdateSideCostRequest $request): array
    {
        $sidecost = app(UpdateSideCostAction::class)->run($request);

        return $this->transform($sidecost, SideCostTransformer::class);
    }

    /**
     * @param DeleteSideCostRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSideCost(DeleteSideCostRequest $request): JsonResponse
    {
        app(DeleteSideCostAction::class)->run($request);

        return $this->noContent();
    }
}
