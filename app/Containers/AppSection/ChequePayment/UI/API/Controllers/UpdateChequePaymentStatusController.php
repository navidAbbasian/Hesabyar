<?php

namespace App\Containers\AppSection\ChequePayment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ChequePayment\Actions\UpdateChequePaymentAction;
use App\Containers\AppSection\ChequePayment\Actions\UpdateChequePaymentStatusAction;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\UpdateChequePaymentRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\UpdateChequePaymentStatusRequest;
use App\Containers\AppSection\ChequePayment\UI\API\Transformers\ChequePaymentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateChequePaymentStatusController extends ApiController
{
    /**
     * @param UpdateChequePaymentStatusRequest $request
     * @return array
     * @throws InvalidTransformerException
     */
    public function updateChequePaymentStatus(UpdateChequePaymentStatusRequest $request): array
    {
        $chequepayment = app(UpdateChequePaymentStatusAction::class)->run($request);

        return $this->transform($chequepayment, ChequePaymentTransformer::class);
    }
}
