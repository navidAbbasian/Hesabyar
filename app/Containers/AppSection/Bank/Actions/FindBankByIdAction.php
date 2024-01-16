<?php

namespace App\Containers\AppSection\Bank\Actions;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\Bank\Tasks\FindBankByIdTask;
use App\Containers\AppSection\Bank\UI\API\Requests\FindBankByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBankByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBankByIdRequest $request): Bank
    {
        return app(FindBankByIdTask::class)->run($request->id);
    }
}
