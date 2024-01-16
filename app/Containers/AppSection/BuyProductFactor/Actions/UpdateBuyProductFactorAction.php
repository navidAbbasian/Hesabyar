<?php

namespace App\Containers\AppSection\BuyProductFactor\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactor\Tasks\UpdateBuyProductFactorTask;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\UpdateBuyProductFactorRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBuyProductFactorAction extends ParentAction
{
    /**
     * @param UpdateBuyProductFactorRequest $request
     * @return BuyProductFactor
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBuyProductFactorRequest $request): BuyProductFactor
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'reverse',
            'factor_number',
//            'title',
            'date',
            'discount_type',
            'discount',
            'tax',
            'description',
            'sum_total_factor',
            'person_id',
            'products'
        ]);

        return app(UpdateBuyProductFactorTask::class)->run($data, $request->id);
    }
}
