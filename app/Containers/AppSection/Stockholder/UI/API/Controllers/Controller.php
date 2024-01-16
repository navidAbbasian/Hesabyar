<?php

namespace App\Containers\AppSection\Stockholder\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Stockholder\Actions\CreateStockholderAction;
use App\Containers\AppSection\Stockholder\Actions\DeleteStockholderAction;
use App\Containers\AppSection\Stockholder\Actions\FindStockholderByIdAction;
use App\Containers\AppSection\Stockholder\Actions\GetAllStockholdersAction;
use App\Containers\AppSection\Stockholder\Actions\UpdateStockholderAction;
use App\Containers\AppSection\Stockholder\UI\API\Requests\CreateStockholderRequest;
use App\Containers\AppSection\Stockholder\UI\API\Requests\DeleteStockholderRequest;
use App\Containers\AppSection\Stockholder\UI\API\Requests\FindStockholderByIdRequest;
use App\Containers\AppSection\Stockholder\UI\API\Requests\GetAllStockholdersRequest;
use App\Containers\AppSection\Stockholder\UI\API\Requests\UpdateStockholderRequest;
use App\Containers\AppSection\Stockholder\UI\API\Transformers\StockholderTransformer;
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
     * @param CreateStockholderRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createStockholder(CreateStockholderRequest $request): JsonResponse
    {
        $stockholder = app(CreateStockholderAction::class)->run($request);

        return $this->created($this->transform($stockholder, StockholderTransformer::class));
    }

    /**
     * @param FindStockholderByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findStockholderById(FindStockholderByIdRequest $request): array
    {
        $stockholder = app(FindStockholderByIdAction::class)->run($request);

        return $this->transform($stockholder, StockholderTransformer::class);
    }

    /**
     * @param GetAllStockholdersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllStockholders(GetAllStockholdersRequest $request): array
    {
        $stockholders = app(GetAllStockholdersAction::class)->run($request);

        return $this->transform($stockholders, StockholderTransformer::class);
    }

    /**
     * @param UpdateStockholderRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateStockholder(UpdateStockholderRequest $request): array
    {
        $stockholder = app(UpdateStockholderAction::class)->run($request);

        return $this->transform($stockholder, StockholderTransformer::class);
    }

    /**
     * @param DeleteStockholderRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteStockholder(DeleteStockholderRequest $request): JsonResponse
    {
        app(DeleteStockholderAction::class)->run($request);

        return $this->noContent();
    }
}
