<?php

namespace App\Containers\AppSection\Bank\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\Bank\Tasks\CreateBankTask;
use App\Containers\AppSection\Bank\UI\API\Requests\CreateBankRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBankAction extends ParentAction
{
    /**
     * @param CreateBankRequest $request
     * @return Bank
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateBankRequest $request): Bank
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'branch',
            'account_number',
            'cart_number',
            'shaba_number',
            'pos_number',
            'account_owner',
            'status',
            'description',
            'inventory',
            'person_id'
        ]);

        return app(CreateBankTask::class)->run($data);
    }
}
