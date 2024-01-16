<?php

namespace App\Containers\AppSection\ChequeReceived\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ChequeReceived\Actions\CreateChequeReceivedAction;
use App\Containers\AppSection\ChequeReceived\Actions\DeleteChequeReceivedAction;
use App\Containers\AppSection\ChequeReceived\Actions\FindChequeReceivedByIdAction;
use App\Containers\AppSection\ChequeReceived\Actions\GetAllChequeReceivedsAction;
use App\Containers\AppSection\ChequeReceived\Actions\UpdateChequeReceivedAction;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\CreateChequeReceivedRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\DeleteChequeReceivedRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\FindChequeReceivedByIdRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\GetAllChequeReceivedsRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\UpdateChequeReceivedRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Transformers\ChequeReceivedTransformer;
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
     * @param CreateChequeReceivedRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createChequeReceived(CreateChequeReceivedRequest $request): JsonResponse
    {
        $chequereceived = app(CreateChequeReceivedAction::class)->run($request);

        return $this->created($this->transform($chequereceived, ChequeReceivedTransformer::class));
    }

    /**
     * @param FindChequeReceivedByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findChequeReceivedById(FindChequeReceivedByIdRequest $request): array
    {
        $chequereceived = app(FindChequeReceivedByIdAction::class)->run($request);

        return $this->transform($chequereceived, ChequeReceivedTransformer::class);
    }

    /**
     * @param GetAllChequeReceivedsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllChequeReceiveds(GetAllChequeReceivedsRequest $request): array
    {
        $chequereceiveds = app(GetAllChequeReceivedsAction::class)->run($request);

        return $this->transform($chequereceiveds,(new ChequeReceivedTransformer())->setDefaultIncludes(['person','user']));
    }

    /**
     * @param UpdateChequeReceivedRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateChequeReceived(UpdateChequeReceivedRequest $request): array
    {
        $chequereceived = app(UpdateChequeReceivedAction::class)->run($request);

        return $this->transform($chequereceived,(new ChequeReceivedTransformer())->setDefaultIncludes(['person','user']));
    }

    /**
     * @param DeleteChequeReceivedRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteChequeReceived(DeleteChequeReceivedRequest $request): JsonResponse
    {
        app(DeleteChequeReceivedAction::class)->run($request);

        return $this->noContent();
    }
}
