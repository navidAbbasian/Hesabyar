<?php

namespace App\Containers\AppSection\ChequeReceived\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\ChequeReceived\Tasks\UpdateChequeReceivedStatusTask;
use App\Containers\AppSection\ChequeReceived\Tasks\UpdateChequeReceivedTask;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\UpdateChequeReceivedRequest;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\UpdateChequeReceivedStatusRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChequeReceivedStatusAction extends ParentAction
{
    /**
     * @param UpdateChequeReceivedStatusRequest $request
     * @return ChequeReceived
     * @throws IncorrectIdException
     */
    public function run(UpdateChequeReceivedStatusRequest $request): ChequeReceived
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'status'
        ]);

        return app(UpdateChequeReceivedStatusTask::class)->run($data, $request->id);
    }
}
