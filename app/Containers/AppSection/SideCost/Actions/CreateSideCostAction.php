<?php

namespace App\Containers\AppSection\SideCost\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideCost\Tasks\CreateSideCostTask;
use App\Containers\AppSection\SideCost\UI\API\Requests\CreateSideCostRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSideCostAction extends ParentAction
{
    /**
     * @param CreateSideCostRequest $request
     * @return SideCost
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSideCostRequest $request): SideCost
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'payment_method',
            'title',
            'amount',
            'description',
            'date',
            'side_cost_category_id',
            'person_id',
            'user_id',
            'bank_id',
            'fund_id',
            'cheque',
            'type'
        ]);

        return app(CreateSideCostTask::class)->run($data);
    }
}
