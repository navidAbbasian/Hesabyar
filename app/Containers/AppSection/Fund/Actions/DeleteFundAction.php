<?php

namespace App\Containers\AppSection\Fund\Actions;

use App\Containers\AppSection\Fund\Tasks\DeleteFundTask;
use App\Containers\AppSection\Fund\UI\API\Requests\DeleteFundRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFundAction extends ParentAction
{
    /**
     * @param DeleteFundRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFundRequest $request): int
    {
        return app(DeleteFundTask::class)->run($request->id);
    }
}
