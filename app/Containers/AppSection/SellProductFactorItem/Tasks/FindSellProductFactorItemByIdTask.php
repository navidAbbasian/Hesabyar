<?php

namespace App\Containers\AppSection\SellProductFactorItem\Tasks;

use App\Containers\AppSection\SellProductFactorItem\Data\Repositories\SellProductFactorItemRepository;
use App\Containers\AppSection\SellProductFactorItem\Events\SellProductFactorItemFoundByIdEvent;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSellProductFactorItemByIdTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): SellProductFactorItem
    {
        try {
            $sellproductfactoritem = $this->repository->withTrashed()->find($id);
            SellProductFactorItemFoundByIdEvent::dispatch($sellproductfactoritem);

            return $sellproductfactoritem;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
