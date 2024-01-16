<?php

namespace App\Containers\AppSection\SellProductFactorReverse\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SellProductFactor\UI\API\Transformers\SellProductFactorTransformer;
use App\Containers\AppSection\SellProductFactorReverse\Actions\CreateSellProductFactorReverseAction;
use App\Containers\AppSection\SellProductFactorReverse\Actions\DeleteSellProductFactorReverseAction;
use App\Containers\AppSection\SellProductFactorReverse\Actions\FindSellProductFactorReverseByIdAction;
use App\Containers\AppSection\SellProductFactorReverse\Actions\GetAllSellProductFactorReversesAction;
use App\Containers\AppSection\SellProductFactorReverse\Actions\UpdateSellProductFactorReverseAction;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\CreateSellProductFactorReverseRequest;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\DeleteSellProductFactorReverseRequest;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\FindSellProductFactorReverseByIdRequest;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\GetAllSellProductFactorReversesRequest;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\UpdateSellProductFactorReverseRequest;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Transformers\SellProductFactorReverseTransformer;
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
     * @param FindSellProductFactorReverseByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSellProductFactorReverseById(FindSellProductFactorReverseByIdRequest $request): array
    {
        $sellproductfactorreverse = app(FindSellProductFactorReverseByIdAction::class)->run($request);

        return $this->transform($sellproductfactorreverse, SellProductFactorTransformer::class);
    }

    /**
     * @param GetAllSellProductFactorReversesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSellProductFactorReverses(GetAllSellProductFactorReversesRequest $request): array
    {
        $sellproductfactorreverses = app(GetAllSellProductFactorReversesAction::class)->run($request);

        return $this->transform($sellproductfactorreverses,(new SellProductFactorTransformer())->setDefaultIncludes(['person']));
    }
}
