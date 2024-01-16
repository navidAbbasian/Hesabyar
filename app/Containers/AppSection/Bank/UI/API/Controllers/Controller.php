<?php

namespace App\Containers\AppSection\Bank\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Bank\Actions\CreateBankAction;
use App\Containers\AppSection\Bank\Actions\DeleteBankAction;
use App\Containers\AppSection\Bank\Actions\FindBankByIdAction;
use App\Containers\AppSection\Bank\Actions\GetAllBanksAction;
use App\Containers\AppSection\Bank\Actions\UpdateBankAction;
use App\Containers\AppSection\Bank\UI\API\Requests\CreateBankRequest;
use App\Containers\AppSection\Bank\UI\API\Requests\DeleteBankRequest;
use App\Containers\AppSection\Bank\UI\API\Requests\FindBankByIdRequest;
use App\Containers\AppSection\Bank\UI\API\Requests\GetAllBanksRequest;
use App\Containers\AppSection\Bank\UI\API\Requests\UpdateBankRequest;
use App\Containers\AppSection\Bank\UI\API\Transformers\BankTransformer;
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
     * @param CreateBankRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createBank(CreateBankRequest $request): JsonResponse
    {
        $bank = app(CreateBankAction::class)->run($request);

        return $this->created($this->transform($bank, BankTransformer::class));
    }

    /**
     * @param FindBankByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBankById(FindBankByIdRequest $request): array
    {
        $bank = app(FindBankByIdAction::class)->run($request);

        return $this->transform($bank, (new BankTransformer())->setDefaultIncludes(['transactions']));
    }

    /**
     * @param GetAllBanksRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBanks(GetAllBanksRequest $request): array
    {
        $banks = app(GetAllBanksAction::class)->run($request);

        return $this->transform($banks, (new BankTransformer())->setDefaultIncludes(['transactions']));
    }

    /**
     * @param UpdateBankRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateBank(UpdateBankRequest $request): array
    {
        $bank = app(UpdateBankAction::class)->run($request);

        return $this->transform($bank, BankTransformer::class);
    }

    /**
     * @param DeleteBankRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteBank(DeleteBankRequest $request): JsonResponse
    {
        app(DeleteBankAction::class)->run($request);

        return $this->noContent();
    }
}
