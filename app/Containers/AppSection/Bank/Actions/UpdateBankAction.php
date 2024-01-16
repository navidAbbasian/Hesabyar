<?php

namespace App\Containers\AppSection\Bank\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\Bank\Tasks\UpdateBankTask;
use App\Containers\AppSection\Bank\UI\API\Requests\UpdateBankRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBankAction extends ParentAction
{
    /**
     * @param UpdateBankRequest $request
     * @return Bank
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBankRequest $request): Bank
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

        return app(UpdateBankTask::class)->run($data, $request->id);
    }
}
