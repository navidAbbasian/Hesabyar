<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Tasks;

use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactorReverse\Events\SellProductFactorReverseFoundByIdEvent;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSellProductFactorReverseByIdTask extends ParentTask
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
            $sellproductfactorreverse = $this->repository->where('reverse', '1')->where('id', $id)->first()->withTrashed();
            SellProductFactorReverseFoundByIdEvent::dispatch($sellproductfactorreverse);

            return $sellproductfactorreverse;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
