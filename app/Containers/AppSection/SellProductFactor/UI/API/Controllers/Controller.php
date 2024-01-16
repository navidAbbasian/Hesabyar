<?php

namespace App\Containers\AppSection\SellProductFactor\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SellProductFactor\Actions\CreateSellProductFactorAction;
use App\Containers\AppSection\SellProductFactor\Actions\DeleteSellProductFactorAction;
use App\Containers\AppSection\SellProductFactor\Actions\FindSellProductFactorByIdAction;
use App\Containers\AppSection\SellProductFactor\Actions\GetAllSellProductFactorsAction;
use App\Containers\AppSection\SellProductFactor\Actions\UpdateSellProductFactorAction;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\CreateSellProductFactorRequest;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\DeleteSellProductFactorRequest;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\FindSellProductFactorByIdRequest;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\GetAllSellProductFactorsRequest;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\UpdateSellProductFactorRequest;
use App\Containers\AppSection\SellProductFactor\UI\API\Transformers\SellProductFactorTransformer;
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
     * @param CreateSellProductFactorRequest $request
//     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSellProductFactor(CreateSellProductFactorRequest $request)/*: JsonResponse*/
    {
        $sellproductfactor = app(CreateSellProductFactorAction::class)->run($request);

        return $this->created($this->transform($sellproductfactor, SellProductFactorTransformer::class));
    }

    /**
     * @param FindSellProductFactorByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSellProductFactorById(FindSellProductFactorByIdRequest $request): array
    {
        $sellproductfactor = app(FindSellProductFactorByIdAction::class)->run($request);

        return $this->transform($sellproductfactor,(new SellProductFactorTransformer())->setDefaultIncludes(['person','supplier', 'user', 'sellProductFactorItems']));
//        return $this->transform($sellproductfactor,SellProductFactorTransformer::class,['person','supplier', 'user', 'sellProductFactorItems']);
    }

    /**
     * @param GetAllSellProductFactorsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSellProductFactors(GetAllSellProductFactorsRequest $request): array
    {
        $sellproductfactors = app(GetAllSellProductFactorsAction::class)->run($request);

        return $this->transform($sellproductfactors,(new SellProductFactorTransformer())->setDefaultIncludes(['person','supplier', 'user', 'sellProductFactorItems']));
    }

    /**
     * @param UpdateSellProductFactorRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSellProductFactor(UpdateSellProductFactorRequest $request): array
    {
        $sellproductfactor = app(UpdateSellProductFactorAction::class)->run($request);

        return $this->transform($sellproductfactor, SellProductFactorTransformer::class);
    }

    /**
     * @param DeleteSellProductFactorRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSellProductFactor(DeleteSellProductFactorRequest $request): JsonResponse
    {
        app(DeleteSellProductFactorAction::class)->run($request);

        return $this->noContent();
    }
}
