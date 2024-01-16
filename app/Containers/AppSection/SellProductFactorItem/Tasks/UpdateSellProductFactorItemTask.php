<?php

namespace App\Containers\AppSection\SellProductFactorItem\Tasks;

use App\Containers\AppSection\SellProductFactorItem\Data\Repositories\SellProductFactorItemRepository;
use App\Containers\AppSection\SellProductFactorItem\Events\SellProductFactorItemUpdatedEvent;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSellProductFactorItemTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): SellProductFactorItem
    {
        try {
            $sellproductfactoritem = $this->repository->update($data, $id);
            SellProductFactorItemUpdatedEvent::dispatch($sellproductfactoritem);

            return $sellproductfactoritem;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
