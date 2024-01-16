<?php

namespace App\Containers\AppSection\BuyProductFactor\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\BuyProductFactor\Actions\CreateBuyProductFactorAction;
use App\Containers\AppSection\BuyProductFactor\Actions\DeleteBuyProductFactorAction;
use App\Containers\AppSection\BuyProductFactor\Actions\FindBuyProductFactorByIdAction;
use App\Containers\AppSection\BuyProductFactor\Actions\GetAllBuyProductFactorsAction;
use App\Containers\AppSection\BuyProductFactor\Actions\UpdateBuyProductFactorAction;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\CreateBuyProductFactorRequest;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\DeleteBuyProductFactorRequest;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\FindBuyProductFactorByIdRequest;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\GetAllBuyProductFactorsRequest;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\UpdateBuyProductFactorRequest;
use App\Containers\AppSection\BuyProductFactor\UI\API\Transformers\BuyProductFactorTransformer;
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
     * @param CreateBuyProductFactorRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createBuyProductFactor(CreateBuyProductFactorRequest $request): JsonResponse
    {
        $buyproductfactor = app(CreateBuyProductFactorAction::class)->run($request);

        return $this->created($this->transform($buyproductfactor, BuyProductFactorTransformer::class));
    }

    /**
     * @param FindBuyProductFactorByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBuyProductFactorById(FindBuyProductFactorByIdRequest $request): array
    {
        $buyproductfactor = app(FindBuyProductFactorByIdAction::class)->run($request);

        return $this->transform($buyproductfactor, (new BuyProductFactorTransformer())->setDefaultIncludes(['person','buyProductFactorItems']));
    }

    /**
     * @param GetAllBuyProductFactorsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBuyProductFactors(GetAllBuyProductFactorsRequest $request): array
    {
        $buyproductfactors = app(GetAllBuyProductFactorsAction::class)->run($request);

        return $this->transform($buyproductfactors, (new BuyProductFactorTransformer())->setDefaultIncludes(['person','buyProductFactorItems']));
    }

    /**
     * @param UpdateBuyProductFactorRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateBuyProductFactor(UpdateBuyProductFactorRequest $request): array
    {
        $buyproductfactor = app(UpdateBuyProductFactorAction::class)->run($request);

        return $this->transform($buyproductfactor, BuyProductFactorTransformer::class);
    }

    /**
     * @param DeleteBuyProductFactorRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteBuyProductFactor(DeleteBuyProductFactorRequest $request): JsonResponse
    {
        app(DeleteBuyProductFactorAction::class)->run($request);

        return $this->noContent();
    }
}
