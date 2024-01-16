<?php

namespace App\Containers\AppSection\SideCost\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideCost\Tasks\UpdateSideCostTask;
use App\Containers\AppSection\SideCost\UI\API\Requests\UpdateSideCostRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSideCostAction extends ParentAction
{
    /**
     * @param UpdateSideCostRequest $request
     * @return SideCost
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSideCostRequest $request): SideCost
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

        return app(UpdateSideCostTask::class)->run($data, $request->id);
    }
}
