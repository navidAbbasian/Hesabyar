<?php

namespace App\Containers\AppSection\Supplier\Actions;

use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Containers\AppSection\Supplier\Tasks\FindSupplierByIdTask;
use App\Containers\AppSection\Supplier\UI\API\Requests\FindSupplierByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSupplierByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSupplierByIdRequest $request): Supplier
    {
        return app(FindSupplierByIdTask::class)->run($request->id);
    }
}
