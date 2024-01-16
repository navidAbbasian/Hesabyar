<?php

namespace App\Containers\AppSection\ChequeReceived\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\ChequeReceived\Tasks\UpdateChequeReceivedTask;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\UpdateChequeReceivedRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChequeReceivedAction extends ParentAction
{
    /**
     * @param UpdateChequeReceivedRequest $request
     * @return ChequeReceived
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateChequeReceivedRequest $request): ChequeReceived
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

        return app(UpdateChequeReceivedTask::class)->run($data, $request->id);
    }
}
