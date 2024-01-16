<?php

namespace App\Containers\AppSection\ChequePayment\Actions;

use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\ChequePayment\Tasks\FindChequePaymentByIdTask;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\FindChequePaymentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindChequePaymentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindChequePaymentByIdRequest $request): ChequePayment
    {
        return app(FindChequePaymentByIdTask::class)->run($request->id);
    }
}
