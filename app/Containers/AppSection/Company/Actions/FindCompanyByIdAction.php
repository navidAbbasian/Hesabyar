<?php

namespace App\Containers\AppSection\Company\Actions;

use App\Containers\AppSection\Company\Models\Company;
use App\Containers\AppSection\Company\Tasks\FindCompanyByIdTask;
use App\Containers\AppSection\Company\UI\API\Requests\FindCompanyByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCompanyByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCompanyByIdRequest $request): Company
    {
        return app(FindCompanyByIdTask::class)->run($request->id);
    }
}
