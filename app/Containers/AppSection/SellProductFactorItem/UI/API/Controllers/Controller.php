<?php

namespace App\Containers\AppSection\SellProductFactorItem\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SellProductFactorItem\Actions\CreateSellProductFactorItemAction;
use App\Containers\AppSection\SellProductFactorItem\Actions\DeleteSellProductFactorItemAction;
use App\Containers\AppSection\SellProductFactorItem\Actions\FindSellProductFactorItemByIdAction;
use App\Containers\AppSection\SellProductFactorItem\Actions\GetAllSellProductFactorItemsAction;
use App\Containers\AppSection\SellProductFactorItem\Actions\UpdateSellProductFactorItemAction;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\CreateSellProductFactorItemRequest;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\DeleteSellProductFactorItemRequest;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\FindSellProductFactorItemByIdRequest;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\GetAllSellProductFactorItemsRequest;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\UpdateSellProductFactorItemRequest;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Transformers\SellProductFactorItemTransformer;
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
     * @param CreateSellProductFactorItemRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSellProductFactorItem(CreateSellProductFactorItemRequest $request): JsonResponse
    {
        $sellproductfactoritem = app(CreateSellProductFactorItemAction::class)->run($request);

        return $this->created($this->transform($sellproductfactoritem, SellProductFactorItemTransformer::class));
    }

    /**
     * @param FindSellProductFactorItemByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSellProductFactorItemById(FindSellProductFactorItemByIdRequest $request): array
    {
        $sellproductfactoritem = app(FindSellProductFactorItemByIdAction::class)->run($request);

        return $this->transform($sellproductfactoritem, SellProductFactorItemTransformer::class);
    }

    /**
     * @param GetAllSellProductFactorItemsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSellProductFactorItems(GetAllSellProductFactorItemsRequest $request): array
    {
        $sellproductfactoritems = app(GetAllSellProductFactorItemsAction::class)->run($request);

        return $this->transform($sellproductfactoritems, SellProductFactorItemTransformer::class);
    }

    /**
     * @param UpdateSellProductFactorItemRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSellProductFactorItem(UpdateSellProductFactorItemRequest $request): array
    {
        $sellproductfactoritem = app(UpdateSellProductFactorItemAction::class)->run($request);

        return $this->transform($sellproductfactoritem, SellProductFactorItemTransformer::class);
    }

    /**
     * @param DeleteSellProductFactorItemRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSellProductFactorItem(DeleteSellProductFactorItemRequest $request): JsonResponse
    {
        app(DeleteSellProductFactorItemAction::class)->run($request);

        return $this->noContent();
    }
}
