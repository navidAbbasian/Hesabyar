<?php

namespace App\Containers\AppSection\ChequePayment\Actions;

use App\Containers\AppSection\ChequePayment\Tasks\DeleteChequePaymentTask;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\DeleteChequePaymentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteChequePaymentAction extends ParentAction
{
    /**
     * @param DeleteChequePaymentRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteChequePaymentRequest $request): int
    {
        return app(DeleteChequePaymentTask::class)->run($request->id);
    }
}
