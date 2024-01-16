<?php

namespace App\Containers\AppSection\ChequeReceived\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\ChequeReceived\Tasks\CreateChequeReceivedTask;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\CreateChequeReceivedRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateChequeReceivedAction extends ParentAction
{
    /**
     * @param CreateChequeReceivedRequest $request
     * @return ChequeReceived
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChequeReceivedRequest $request): ChequeReceived
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'date',
            'bank_name',
            'branch_name',
            'amount',
            'description',
            'cheque_image',
            'status',
            'person_id',
            'user_id'
        ]);

        return app(CreateChequeReceivedTask::class)->run($data);
    }
}
