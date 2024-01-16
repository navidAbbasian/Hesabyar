<?php

namespace App\Containers\AppSection\Unit\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Unit\Actions\CreateUnitAction;
use App\Containers\AppSection\Unit\Actions\DeleteUnitAction;
use App\Containers\AppSection\Unit\Actions\FindUnitByIdAction;
use App\Containers\AppSection\Unit\Actions\GetAllUnitsAction;
use App\Containers\AppSection\Unit\Actions\UpdateUnitAction;
use App\Containers\AppSection\Unit\UI\API\Requests\CreateUnitRequest;
use App\Containers\AppSection\Unit\UI\API\Requests\DeleteUnitRequest;
use App\Containers\AppSection\Unit\UI\API\Requests\FindUnitByIdRequest;
use App\Containers\AppSection\Unit\UI\API\Requests\GetAllUnitsRequest;
use App\Containers\AppSection\Unit\UI\API\Requests\UpdateUnitRequest;
use App\Containers\AppSection\Unit\UI\API\Transformers\UnitTransformer;
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
     * @param CreateUnitRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createUnit(CreateUnitRequest $request): JsonResponse
    {
        $unit = app(CreateUnitAction::class)->run($request);

        return $this->created($this->transform($unit, UnitTransformer::class));
    }

    /**
     * @param FindUnitByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findUnitById(FindUnitByIdRequest $request): array
    {
        $unit = app(FindUnitByIdAction::class)->run($request);

        return $this->transform($unit, UnitTransformer::class);
    }

    /**
     * @param GetAllUnitsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllUnits(GetAllUnitsRequest $request): array
    {
        $units = app(GetAllUnitsAction::class)->run($request);

        return $this->transform($units, UnitTransformer::class);
    }

    /**
     * @param UpdateUnitRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateUnit(UpdateUnitRequest $request): array
    {
        $unit = app(UpdateUnitAction::class)->run($request);

        return $this->transform($unit, UnitTransformer::class);
    }

    /**
     * @param DeleteUnitRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteUnit(DeleteUnitRequest $request): JsonResponse
    {
        app(DeleteUnitAction::class)->run($request);

        return $this->noContent();
    }
}
