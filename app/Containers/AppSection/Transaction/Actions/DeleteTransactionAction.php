<?php

namespace App\Containers\AppSection\Transaction\Actions;

use App\Containers\AppSection\Transaction\Tasks\DeleteTransactionTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\DeleteTransactionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTransactionAction extends ParentAction
{
    /**
     * @param DeleteTransactionRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTransactionRequest $request): int
    {
        return app(DeleteTransactionTask::class)->run($request->id);
    }
}
