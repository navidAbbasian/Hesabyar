<?php

namespace App\Containers\AppSection\FinancialReport\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\FinancialReport\Tasks\GetAllFinancialReportsTask;
use App\Containers\AppSection\FinancialReport\UI\API\Requests\GetAllFinancialReportsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFinancialReportsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllFinancialReportsRequest $request): mixed
    {
        return app(GetAllFinancialReportsTask::class)->run();
    }
}
