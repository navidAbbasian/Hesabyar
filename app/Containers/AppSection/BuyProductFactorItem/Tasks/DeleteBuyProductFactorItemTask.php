<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Tasks;

use App\Containers\AppSection\BuyProductFactorItem\Data\Repositories\BuyProductFactorItemRepository;
use App\Containers\AppSection\BuyProductFactorItem\Events\BuyProductFactorItemDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteBuyProductFactorItemTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorItemRepository $repository
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
            BuyProductFactorItemDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
