<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Actions;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactorReverse\Tasks\FindBuyProductFactorReverseByIdTask;
use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Requests\FindBuyProductFactorReverseByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBuyProductFactorReverseByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBuyProductFactorReverseByIdRequest $request): BuyProductFactor
    {
        return app(FindBuyProductFactorReverseByIdTask::class)->run($request->id);
    }
}
