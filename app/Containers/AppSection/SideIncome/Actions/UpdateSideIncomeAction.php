<?php

namespace App\Containers\AppSection\SideIncome\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\SideIncome\Tasks\UpdateSideIncomeTask;
use App\Containers\AppSection\SideIncome\UI\API\Requests\UpdateSideIncomeRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSideIncomeAction extends ParentAction
{
    /**
     * @param UpdateSideIncomeRequest $request
     * @return SideIncome
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSideIncomeRequest $request): SideIncome
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'payment_method',
            'title',
            'amount',
            'description',
            'date',
            'side_income_category_id',
            'person_id',
            'user_id',
            'bank_id',
            'fund_id',
            'type'
        ]);

        return app(UpdateSideIncomeTask::class)->run($data, $request->id);
    }
}
