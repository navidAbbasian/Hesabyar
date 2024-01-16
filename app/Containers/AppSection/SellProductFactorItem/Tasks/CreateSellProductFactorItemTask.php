<?php

namespace App\Containers\AppSection\SellProductFactorItem\Tasks;

use App\Containers\AppSection\SellProductFactorItem\Data\Repositories\SellProductFactorItemRepository;
use App\Containers\AppSection\SellProductFactorItem\Events\SellProductFactorItemCreatedEvent;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateSellProductFactorItemTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): SellProductFactorItem
    {
        try {
            $sellproductfactoritem = $this->repository->create($data);
            SellProductFactorItemCreatedEvent::dispatch($sellproductfactoritem);

            return $sellproductfactoritem;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
