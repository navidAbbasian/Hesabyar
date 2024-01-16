<?php

namespace App\Containers\AppSection\SellProductFactor\Actions;

use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactor\Tasks\FindSellProductFactorByIdTask;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\FindSellProductFactorByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSellProductFactorByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSellProductFactorByIdRequest $request): SellProductFactor
    {
        return app(FindSellProductFactorByIdTask::class)->run($request->id);
    }
}
