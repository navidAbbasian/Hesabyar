<?php

namespace App\Containers\AppSection\Company\Actions;

use App\Containers\AppSection\Company\Tasks\DeleteCompanyTask;
use App\Containers\AppSection\Company\UI\API\Requests\DeleteCompanyRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCompanyAction extends ParentAction
{
    /**
     * @param DeleteCompanyRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCompanyRequest $request): int
    {
        return app(DeleteCompanyTask::class)->run($request->id);
    }
}
