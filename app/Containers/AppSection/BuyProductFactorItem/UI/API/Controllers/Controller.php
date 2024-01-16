<?php

namespace App\Containers\AppSection\BuyProductFactorItem\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\BuyProductFactorItem\Actions\CreateBuyProductFactorItemAction;
use App\Containers\AppSection\BuyProductFactorItem\Actions\DeleteBuyProductFactorItemAction;
use App\Containers\AppSection\BuyProductFactorItem\Actions\FindBuyProductFactorItemByIdAction;
use App\Containers\AppSection\BuyProductFactorItem\Actions\GetAllBuyProductFactorItemsAction;
use App\Containers\AppSection\BuyProductFactorItem\Actions\UpdateBuyProductFactorItemAction;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\CreateBuyProductFactorItemRequest;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\DeleteBuyProductFactorItemRequest;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\FindBuyProductFactorItemByIdRequest;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\GetAllBuyProductFactorItemsRequest;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\UpdateBuyProductFactorItemRequest;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Transformers\BuyProductFactorItemTransformer;
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
     * @param CreateBuyProductFactorItemRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createBuyProductFactorItem(CreateBuyProductFactorItemRequest $request): JsonResponse
    {
        $buyproductfactoritem = app(CreateBuyProductFactorItemAction::class)->run($request);

        return $this->created($this->transform($buyproductfactoritem, BuyProductFactorItemTransformer::class));
    }

    /**
     * @param FindBuyProductFactorItemByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBuyProductFactorItemById(FindBuyProductFactorItemByIdRequest $request): array
    {
        $buyproductfactoritem = app(FindBuyProductFactorItemByIdAction::class)->run($request);

        return $this->transform($buyproductfactoritem, BuyProductFactorItemTransformer::class);
    }

    /**
     * @param GetAllBuyProductFactorItemsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBuyProductFactorItems(GetAllBuyProductFactorItemsRequest $request): array
    {
        $buyproductfactoritems = app(GetAllBuyProductFactorItemsAction::class)->run($request);

        return $this->transform($buyproductfactoritems, BuyProductFactorItemTransformer::class);
    }

    /**
     * @param UpdateBuyProductFactorItemRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateBuyProductFactorItem(UpdateBuyProductFactorItemRequest $request): array
    {
        $buyproductfactoritem = app(UpdateBuyProductFactorItemAction::class)->run($request);

        return $this->transform($buyproductfactoritem, BuyProductFactorItemTransformer::class);
    }

    /**
     * @param DeleteBuyProductFactorItemRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteBuyProductFactorItem(DeleteBuyProductFactorItemRequest $request): JsonResponse
    {
        app(DeleteBuyProductFactorItemAction::class)->run($request);

        return $this->noContent();
    }
}
