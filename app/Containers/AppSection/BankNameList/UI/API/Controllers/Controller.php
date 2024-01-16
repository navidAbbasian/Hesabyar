<?php

namespace App\Containers\AppSection\BankNameList\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\BankNameList\Actions\CreateBankNameListAction;
use App\Containers\AppSection\BankNameList\Actions\DeleteBankNameListAction;
use App\Containers\AppSection\BankNameList\Actions\FindBankNameListByIdAction;
use App\Containers\AppSection\BankNameList\Actions\GetAllBankNameListsAction;
use App\Containers\AppSection\BankNameList\Actions\UpdateBankNameListAction;
use App\Containers\AppSection\BankNameList\UI\API\Requests\CreateBankNameListRequest;
use App\Containers\AppSection\BankNameList\UI\API\Requests\DeleteBankNameListRequest;
use App\Containers\AppSection\BankNameList\UI\API\Requests\FindBankNameListByIdRequest;
use App\Containers\AppSection\BankNameList\UI\API\Requests\GetAllBankNameListsRequest;
use App\Containers\AppSection\BankNameList\UI\API\Requests\UpdateBankNameListRequest;
use App\Containers\AppSection\BankNameList\UI\API\Transformers\BankNameListTransformer;
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
     * @param CreateBankNameListRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createBankNameList(CreateBankNameListRequest $request): JsonResponse
    {
        $banknamelist = app(CreateBankNameListAction::class)->run($request);

        return $this->created($this->transform($banknamelist, BankNameListTransformer::class));
    }

    /**
     * @param FindBankNameListByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBankNameListById(FindBankNameListByIdRequest $request): array
    {
        $banknamelist = app(FindBankNameListByIdAction::class)->run($request);

        return $this->transform($banknamelist, BankNameListTransformer::class);
    }

    /**
     * @param GetAllBankNameListsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBankNameLists(GetAllBankNameListsRequest $request): array
    {
        $banknamelists = app(GetAllBankNameListsAction::class)->run($request);

        return $this->transform($banknamelists, BankNameListTransformer::class);
    }

    /**
     * @param UpdateBankNameListRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateBankNameList(UpdateBankNameListRequest $request): array
    {
        $banknamelist = app(UpdateBankNameListAction::class)->run($request);

        return $this->transform($banknamelist, BankNameListTransformer::class);
    }

    /**
     * @param DeleteBankNameListRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteBankNameList(DeleteBankNameListRequest $request): JsonResponse
    {
        app(DeleteBankNameListAction::class)->run($request);

        return $this->noContent();
    }
}
