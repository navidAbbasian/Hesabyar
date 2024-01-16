<?php

namespace App\Containers\AppSection\Transaction\Actions;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\Tasks\FindTransactionByIdTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\FindTransactionByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTransactionByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindTransactionByIdRequest $request): Transaction
    {
        return app(FindTransactionByIdTask::class)->run($request->id);
    }
}
