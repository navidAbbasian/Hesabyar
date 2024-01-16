<?php

namespace App\Containers\AppSection\BankNameList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Containers\AppSection\BankNameList\Tasks\CreateBankNameListTask;
use App\Containers\AppSection\BankNameList\UI\API\Requests\CreateBankNameListRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBankNameListAction extends ParentAction
{
    /**
     * @param CreateBankNameListRequest $request
     * @return BankNameList
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateBankNameListRequest $request): BankNameList
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name'
        ]);

        return app(CreateBankNameListTask::class)->run($data);
    }
}
