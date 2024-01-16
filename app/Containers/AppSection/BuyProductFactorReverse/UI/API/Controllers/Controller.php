<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\BuyProductFactor\UI\API\Transformers\BuyProductFactorTransformer;
use App\Containers\AppSection\BuyProductFactorReverse\Actions\CreateBuyProductFactorReverseAction;
use App\Containers\AppSection\BuyProductFactorReverse\Actions\DeleteBuyProductFactorReverseAction;
use App\Containers\AppSection\BuyProductFactorReverse\Actions\FindBuyProductFactorReverseByIdAction;
use App\Containers\AppSection\BuyProductFactorReverse\Actions\GetAllBuyProductFactorReversesAction;
use App\Containers\AppSection\BuyProductFactorReverse\Actions\UpdateBuyProductFactorReverseAction;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\CreateBuyProductFactorReverseRequest;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\DeleteBuyProductFactorReverseRequest;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\FindBuyProductFactorReverseByIdRequest;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\GetAllBuyProductFactorReversesRequest;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\UpdateBuyProductFactorReverseRequest;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Transformers\BuyProductFactorReverseTransformer;
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
     * @param FindBuyProductFactorReverseByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBuyProductFactorReverseById(FindBuyProductFactorReverseByIdRequest $request): array
    {
        $buyproductfactorreverse = app(FindBuyProductFactorReverseByIdAction::class)->run($request);

        return $this->transform($buyproductfactorreverse, BuyProductFactorTransformer::class);
    }

    /**
     * @param GetAllBuyProductFactorReversesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBuyProductFactorReverses(GetAllBuyProductFactorReversesRequest $request): array
    {
        $buyproductfactorreverses = app(GetAllBuyProductFactorReversesAction::class)->run($request);

        return $this->transform($buyproductfactorreverses,(new  BuyProductFactorTransformer())->setDefaultIncludes(['person'/*,'buyProductFactorItems'*/]));
    }
}
