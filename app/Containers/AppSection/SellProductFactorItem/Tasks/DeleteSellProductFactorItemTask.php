<?php

namespace App\Containers\AppSection\SellProductFactorItem\Tasks;

use App\Containers\AppSection\SellProductFactorItem\Data\Repositories\SellProductFactorItemRepository;
use App\Containers\AppSection\SellProductFactorItem\Events\SellProductFactorItemDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteSellProductFactorItemTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            SellProductFactorItemDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
