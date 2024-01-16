<?php

namespace App\Containers\AppSection\BankNameList\Actions;

use App\Containers\AppSection\BankNameList\Tasks\DeleteBankNameListTask;
use App\Containers\AppSection\BankNameList\UI\API\Requests\DeleteBankNameListRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBankNameListAction extends ParentAction
{
    /**
     * @param DeleteBankNameListRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBankNameListRequest $request): int
    {
        return app(DeleteBankNameListTask::class)->run($request->id);
    }
}
