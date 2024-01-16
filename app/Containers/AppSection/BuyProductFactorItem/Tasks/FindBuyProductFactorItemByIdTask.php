<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Tasks;

use App\Containers\AppSection\BuyProductFactorItem\Data\Repositories\BuyProductFactorItemRepository;
use App\Containers\AppSection\BuyProductFactorItem\Events\BuyProductFactorItemFoundByIdEvent;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBuyProductFactorItemByIdTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): BuyProductFactorItem
    {
        try {
            $buyproductfactoritem = $this->repository->withTrashed()->find($id);
            BuyProductFactorItemFoundByIdEvent::dispatch($buyproductfactoritem);

            return $buyproductfactoritem;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
