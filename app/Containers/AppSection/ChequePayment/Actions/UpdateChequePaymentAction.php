<?php

namespace App\Containers\AppSection\ChequePayment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\ChequePayment\Tasks\UpdateChequePaymentTask;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\UpdateChequePaymentRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChequePaymentAction extends ParentAction
{
    /**
     * @param UpdateChequePaymentRequest $request
     * @return ChequePayment
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateChequePaymentRequest $request): ChequePayment
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'date',
            'bank_name',
            'branch_name',
            'amount',
            'description',
            'status',
            'person_id'
        ]);

        return app(UpdateChequePaymentTask::class)->run($data, $request->id);
    }
}
