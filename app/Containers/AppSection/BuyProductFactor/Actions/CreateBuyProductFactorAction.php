<?php

namespace App\Containers\AppSection\BuyProductFactor\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactor\Tasks\CreateBuyProductFactorTask;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\CreateBuyProductFactorRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBuyProductFactorAction extends ParentAction
{
    /**
     * @param CreateBuyProductFactorRequest $request
     * @return BuyProductFactor
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateBuyProductFactorRequest $request): BuyProductFactor
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

        return app(CreateBuyProductFactorTask::class)->run($data);
    }
}
