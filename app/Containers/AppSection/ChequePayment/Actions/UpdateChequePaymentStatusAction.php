<?php

namespace App\Containers\AppSection\ChequePayment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\ChequePayment\Tasks\UpdateChequePaymentStatusTask;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\UpdateChequePaymentStatusRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChequePaymentStatusAction extends ParentAction
{
    /**
     * @param UpdateChequePaymentStatusRequest $request
     * @return ChequePayment
     * @throws IncorrectIdException
     */
    public function run(UpdateChequePaymentStatusRequest $request): ChequePayment
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'status'
        ]);

        return app(UpdateChequePaymentStatusTask::class)->run($data, $request->id);
    }
}
