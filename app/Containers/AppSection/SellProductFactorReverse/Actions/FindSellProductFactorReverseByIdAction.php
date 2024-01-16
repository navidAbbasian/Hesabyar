<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Actions;

use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactorReverse\Tasks\FindSellProductFactorReverseByIdTask;
use App\Containers\AppSection\SellProductFactorReverse\UI\API\Requests\FindSellProductFactorReverseByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSellProductFactorReverseByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSellProductFactorReverseByIdRequest $request): SellProductFactor
    {
        return app(FindSellProductFactorReverseByIdTask::class)->run($request->id);
    }
}
