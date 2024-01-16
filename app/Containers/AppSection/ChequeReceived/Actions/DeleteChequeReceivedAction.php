<?php

namespace App\Containers\AppSection\ChequeReceived\Actions;

use App\Containers\AppSection\ChequeReceived\Tasks\DeleteChequeReceivedTask;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\DeleteChequeReceivedRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteChequeReceivedAction extends ParentAction
{
    /**
     * @param DeleteChequeReceivedRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteChequeReceivedRequest $request): int
    {
        return app(DeleteChequeReceivedTask::class)->run($request->id);
    }
}
