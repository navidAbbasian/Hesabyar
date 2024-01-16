<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Tasks;

use App\Containers\AppSection\BuyProductFactorItem\Data\Repositories\BuyProductFactorItemRepository;
use App\Containers\AppSection\BuyProductFactorItem\Events\BuyProductFactorItemUpdatedEvent;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateBuyProductFactorItemTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): BuyProductFactorItem
    {
        try {
            $buyproductfactoritem = $this->repository->update($data, $id);
            BuyProductFactorItemUpdatedEvent::dispatch($buyproductfactoritem);

            return $buyproductfactoritem;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
