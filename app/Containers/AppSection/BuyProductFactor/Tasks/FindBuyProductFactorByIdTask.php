<?php

namespace App\Containers\AppSection\BuyProductFactor\Tasks;

use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactor\Events\BuyProductFactorFoundByIdEvent;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBuyProductFactorByIdTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): BuyProductFactor
    {
        try {
            $buyproductfactor = $this->repository->withTrashed()->find($id);
            BuyProductFactorFoundByIdEvent::dispatch($buyproductfactor);

            return $buyproductfactor;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
