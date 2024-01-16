<?php

namespace App\Containers\AppSection\ChequeReceived\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ChequeReceived\Actions\UpdateChequeReceivedAction;
use App\Containers\AppSection\ChequeReceived\Actions\UpdateChequeReceivedStatusAction;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\UpdateChequeReceivedRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\UpdateChequeReceivedStatusRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Transformers\ChequeReceivedTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateChequeReceivedStatusController extends ApiController
{
    /**
     * @param UpdateChequeReceivedStatusRequest $request
     * @return array
     * @throws InvalidTransformerException
     */
    public function updateChequeReceivedStatus(UpdateChequeReceivedStatusRequest $request): array
    {
        $chequereceived = app(UpdateChequeReceivedStatusAction::class)->run($request);

        return $this->transform($chequereceived, ChequeReceivedTransformer::class);
    }
}
