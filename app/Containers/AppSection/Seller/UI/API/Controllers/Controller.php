<?php

namespace App\Containers\AppSection\Seller\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Seller\Actions\FindSellerByIdAction;
use App\Containers\AppSection\Seller\Actions\GetAllSellersAction;
use App\Containers\AppSection\Seller\UI\API\Requests\FindSellerByIdRequest;
use App\Containers\AppSection\Seller\UI\API\Requests\GetAllSellersRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param FindSellerByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSellerById(FindSellerByIdRequest $request): array
    {
        $seller = app(FindSellerByIdAction::class)->run($request);
//        return $this->transform($seller, (new UserTransformer())->setDefaultIncludes(['sellProductFactors','sideIncomes','children','parent']));
        return $this->transform($seller, UserTransformer::class);
    }

    /**
     * @param GetAllSellersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSellers(GetAllSellersRequest $request): array
    {
        $sellers = app(GetAllSellersAction::class)->run($request);
//        return $this->transform($sellers,(new UserTransformer())->setDefaultIncludes(['sellProductFactors','sideIncomes','children','parent']));
        return $this->transform($sellers,UserTransformer::class);
    }
}
