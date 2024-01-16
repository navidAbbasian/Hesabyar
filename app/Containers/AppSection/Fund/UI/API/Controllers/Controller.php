<?php

namespace App\Containers\AppSection\Fund\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Fund\Actions\CreateFundAction;
use App\Containers\AppSection\Fund\Actions\DeleteFundAction;
use App\Containers\AppSection\Fund\Actions\FindFundByIdAction;
use App\Containers\AppSection\Fund\Actions\GetAllFundsAction;
use App\Containers\AppSection\Fund\Actions\UpdateFundAction;
use App\Containers\AppSection\Fund\UI\API\Requests\CreateFundRequest;
use App\Containers\AppSection\Fund\UI\API\Requests\DeleteFundRequest;
use App\Containers\AppSection\Fund\UI\API\Requests\FindFundByIdRequest;
use App\Containers\AppSection\Fund\UI\API\Requests\GetAllFundsRequest;
use App\Containers\AppSection\Fund\UI\API\Requests\UpdateFundRequest;
use App\Containers\AppSection\Fund\UI\API\Transformers\FundTransformer;
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
     * @param CreateFundRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createFund(CreateFundRequest $request): JsonResponse
    {
        $fund = app(CreateFundAction::class)->run($request);

        return $this->created($this->transform($fund, FundTransformer::class));
    }

    /**
     * @param FindFundByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findFundById(FindFundByIdRequest $request): array
    {
        $fund = app(FindFundByIdAction::class)->run($request);

        return $this->transform($fund,(new FundTransformer())->setDefaultIncludes(['transactions']));
    }

    /**
     * @param GetAllFundsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllFunds(GetAllFundsRequest $request): array
    {
        $funds = app(GetAllFundsAction::class)->run($request);

        return $this->transform($funds,(new FundTransformer())->setDefaultIncludes(['transactions']));
    }

    /**
     * @param UpdateFundRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateFund(UpdateFundRequest $request): array
    {
        $fund = app(UpdateFundAction::class)->run($request);

        return $this->transform($fund, FundTransformer::class);
    }

    /**
     * @param DeleteFundRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteFund(DeleteFundRequest $request): JsonResponse
    {
        app(DeleteFundAction::class)->run($request);

        return $this->noContent();
    }
}
