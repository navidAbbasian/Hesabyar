<?php

namespace App\Containers\AppSection\ChequePayment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ChequePayment\Actions\CreateChequePaymentAction;
use App\Containers\AppSection\ChequePayment\Actions\DeleteChequePaymentAction;
use App\Containers\AppSection\ChequePayment\Actions\FindChequePaymentByIdAction;
use App\Containers\AppSection\ChequePayment\Actions\GetAllChequePaymentsAction;
use App\Containers\AppSection\ChequePayment\Actions\UpdateChequePaymentAction;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\CreateChequePaymentRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\DeleteChequePaymentRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\FindChequePaymentByIdRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\GetAllChequePaymentsRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\UpdateChequePaymentRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Transformers\ChequePaymentTransformer;
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
     * @param CreateChequePaymentRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createChequePayment(CreateChequePaymentRequest $request): JsonResponse
    {
        $chequepayment = app(CreateChequePaymentAction::class)->run($request);

        return $this->created($this->transform($chequepayment, ChequePaymentTransformer::class));
    }

    /**
     * @param FindChequePaymentByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findChequePaymentById(FindChequePaymentByIdRequest $request): array
    {
        $chequepayment = app(FindChequePaymentByIdAction::class)->run($request);

        return $this->transform($chequepayment, (new ChequePaymentTransformer())->setDefaultIncludes(['person','transactions']));
    }

    /**
     * @param GetAllChequePaymentsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllChequePayments(GetAllChequePaymentsRequest $request): array
    {
        $chequepayments = app(GetAllChequePaymentsAction::class)->run($request);

        return $this->transform($chequepayments,(new ChequePaymentTransformer())->setDefaultIncludes(['person','transactions']));
    }

    /**
     * @param UpdateChequePaymentRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateChequePayment(UpdateChequePaymentRequest $request): array
    {
        $chequepayment = app(UpdateChequePaymentAction::class)->run($request);

        return $this->transform($chequepayment, ChequePaymentTransformer::class);
    }

    /**
     * @param DeleteChequePaymentRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteChequePayment(DeleteChequePaymentRequest $request): JsonResponse
    {
        app(DeleteChequePaymentAction::class)->run($request);

        return $this->noContent();
    }
}
