<?php

namespace App\Containers\AppSection\BankNameList\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BankNameList\Tasks\GetAllBankNameListsTask;
use App\Containers\AppSection\BankNameList\UI\API\Requests\GetAllBankNameListsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBankNameListsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBankNameListsRequest $request): mixed
    {
        return app(GetAllBankNameListsTask::class)->run();
    }
}
