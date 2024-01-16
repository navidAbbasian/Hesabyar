<?php

namespace App\Containers\AppSection\Supplier\Actions;

use App\Containers\AppSection\Supplier\Tasks\DeleteSupplierTask;
use App\Containers\AppSection\Supplier\UI\API\Requests\DeleteSupplierRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSupplierAction extends ParentAction
{
    /**
     * @param DeleteSupplierRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSupplierRequest $request): int
    {
        return app(DeleteSupplierTask::class)->run($request->id);
    }
}
