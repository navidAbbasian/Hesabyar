<?php

namespace App\Containers\AppSection\ChequeReceived\Actions;

use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\ChequeReceived\Tasks\FindChequeReceivedByIdTask;
use App\Containers\AppSection\ChequeReceived\UI\API\Requests\FindChequeReceivedByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindChequeReceivedByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindChequeReceivedByIdRequest $request): ChequeReceived
    {
        return app(FindChequeReceivedByIdTask::class)->run($request->id);
    }
}
