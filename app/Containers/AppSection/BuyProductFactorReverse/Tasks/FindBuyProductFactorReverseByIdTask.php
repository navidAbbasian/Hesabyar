<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Tasks;

use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\BuyProductFactorReverse\Events\BuyProductFactorReverseFoundByIdEvent;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBuyProductFactorReverseByIdTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): mixed
    {
        try {
            $buyproductfactorreverse = $this->repository->where('reverse', '1')->where('id', $id)->first()->withTrashed();
//            dd($buyproductfactorreverse);
            BuyProductFactorReverseFoundByIdEvent::dispatch($buyproductfactorreverse);

            return $buyproductfactorreverse;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
