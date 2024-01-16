<?php

namespace App\Containers\AppSection\Stockholder\Tasks;

use App\Containers\AppSection\Stockholder\Data\Repositories\StockholderRepository;
use App\Containers\AppSection\Stockholder\Events\StockholderFoundByIdEvent;
use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindStockholderByIdTask extends ParentTask
{
    public function __construct(
        protected StockholderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Stockholder
    {
        try {
            $stockholder = $this->repository->withTrashed()->find($id);
            StockholderFoundByIdEvent::dispatch($stockholder);

            return $stockholder;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
