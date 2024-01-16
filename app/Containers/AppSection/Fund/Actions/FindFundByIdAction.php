<?php

namespace App\Containers\AppSection\Fund\Actions;

use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Fund\Tasks\FindFundByIdTask;
use App\Containers\AppSection\Fund\UI\API\Requests\FindFundByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindFundByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindFundByIdRequest $request): Fund
    {
        return app(FindFundByIdTask::class)->run($request->id);
    }
}
