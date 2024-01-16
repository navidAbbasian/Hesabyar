<?php

namespace App\Containers\AppSection\ChequePayment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\ChequePayment\Tasks\CreateChequePaymentTask;
use App\Containers\AppSection\ChequePayment\UI\API\Requests\CreateChequePaymentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateChequePaymentAction extends ParentAction
{
    /**
     * @param CreateChequePaymentRequest $request
     * @return ChequePayment
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChequePaymentRequest $request): ChequePayment
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

        return app(CreateChequePaymentTask::class)->run($data);
    }
}
