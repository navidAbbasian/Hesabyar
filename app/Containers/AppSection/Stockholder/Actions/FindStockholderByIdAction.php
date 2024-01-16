<?php

namespace App\Containers\AppSection\Stockholder\Actions;

use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Containers\AppSection\Stockholder\Tasks\FindStockholderByIdTask;
use App\Containers\AppSection\Stockholder\UI\API\Requests\FindStockholderByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindStockholderByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindStockholderByIdRequest $request): Stockholder
    {
        return app(FindStockholderByIdTask::class)->run($request->id);
    }
}
