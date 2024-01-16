<?php

namespace App\Containers\AppSection\BuyProductFactor\Actions;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactor\Tasks\FindBuyProductFactorByIdTask;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\FindBuyProductFactorByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBuyProductFactorByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBuyProductFactorByIdRequest $request): BuyProductFactor
    {
        return app(FindBuyProductFactorByIdTask::class)->run($request->id);
    }
}
