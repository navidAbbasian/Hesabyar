<?php

namespace App\Containers\AppSection\Fund\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Fund\Tasks\CreateFundTask;
use App\Containers\AppSection\Fund\UI\API\Requests\CreateFundRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFundAction extends ParentAction
{
    /**
     * @param CreateFundRequest $request
     * @return Fund
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFundRequest $request): Fund
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'inventory',
            'description',
            'status'
        ]);

        return app(CreateFundTask::class)->run($data);
    }
}
