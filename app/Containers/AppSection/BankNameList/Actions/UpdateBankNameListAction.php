<?php

namespace App\Containers\AppSection\BankNameList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Containers\AppSection\BankNameList\Tasks\UpdateBankNameListTask;
use App\Containers\AppSection\BankNameList\UI\API\Requests\UpdateBankNameListRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBankNameListAction extends ParentAction
{
    /**
     * @param UpdateBankNameListRequest $request
     * @return BankNameList
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBankNameListRequest $request): BankNameList
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name'
        ]);

        return app(UpdateBankNameListTask::class)->run($data, $request->id);
    }
}
