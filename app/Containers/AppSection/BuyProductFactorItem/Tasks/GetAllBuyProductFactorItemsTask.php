<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BuyProductFactorItem\Data\Repositories\BuyProductFactorItemRepository;
use App\Containers\AppSection\BuyProductFactorItem\Events\BuyProductFactorItemsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBuyProductFactorItemsTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorItemRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate();
        BuyProductFactorItemsListedEvent::dispatch($result);

        return $result;
    }
}
