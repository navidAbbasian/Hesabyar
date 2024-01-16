<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Tasks;

use App\Containers\AppSection\BuyProductFactorItem\Data\Repositories\BuyProductFactorItemRepository;
use App\Containers\AppSection\BuyProductFactorItem\Events\BuyProductFactorItemCreatedEvent;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateBuyProductFactorItemTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): BuyProductFactorItem
    {
        try {
            $buyproductfactoritem = $this->repository->create($data);
            BuyProductFactorItemCreatedEvent::dispatch($buyproductfactoritem);

            return $buyproductfactoritem;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
