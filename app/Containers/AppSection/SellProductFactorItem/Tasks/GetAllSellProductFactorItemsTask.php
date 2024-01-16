<?php

namespace App\Containers\AppSection\SellProductFactorItem\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SellProductFactorItem\Data\Repositories\SellProductFactorItemRepository;
use App\Containers\AppSection\SellProductFactorItem\Events\SellProductFactorItemsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellProductFactorItemsTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate();
        SellProductFactorItemsListedEvent::dispatch($result);

        return $result;
    }
}
