<?php

namespace App\Containers\AppSection\BankNameList\Actions;

use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Containers\AppSection\BankNameList\Tasks\FindBankNameListByIdTask;
use App\Containers\AppSection\BankNameList\UI\API\Requests\FindBankNameListByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBankNameListByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBankNameListByIdRequest $request): BankNameList
    {
        return app(FindBankNameListByIdTask::class)->run($request->id);
    }
}
