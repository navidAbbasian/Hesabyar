<?php

namespace App\Containers\AppSection\SideIncome\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\SideIncome\Tasks\CreateSideIncomeTask;
use App\Containers\AppSection\SideIncome\UI\API\Requests\CreateSideIncomeRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSideIncomeAction extends ParentAction
{
    /**
     * @param CreateSideIncomeRequest $request
     * @return SideIncome
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSideIncomeRequest $request): SideIncome
    {
        $data = $request->sanitizeInput([
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

        return app(CreateSideIncomeTask::class)->run($data);
    }
}
