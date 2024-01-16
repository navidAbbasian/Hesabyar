<?php

namespace App\Containers\AppSection\Fund\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Fund\Tasks\UpdateFundTask;
use App\Containers\AppSection\Fund\UI\API\Requests\UpdateFundRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateFundAction extends ParentAction
{
    /**
     * @param UpdateFundRequest $request
     * @return Fund
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFundRequest $request): Fund
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'inventory',
            'description',
            'status'
        ]);

        return app(UpdateFundTask::class)->run($data, $request->id);
    }
}
