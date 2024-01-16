<?php

namespace App\Containers\AppSection\SellProductFactor\Tasks;

use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactor\Events\SellProductFactorFoundByIdEvent;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSellProductFactorByIdTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): SellProductFactor
    {
        try {
            $sellproductfactor = $this->repository->withTrashed()->find($id);
            SellProductFactorFoundByIdEvent::dispatch($sellproductfactor);

            return $sellproductfactor;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
