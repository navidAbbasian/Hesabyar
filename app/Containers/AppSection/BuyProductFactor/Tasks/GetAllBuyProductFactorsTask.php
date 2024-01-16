<?php

namespace App\Containers\AppSection\BuyProductFactor\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactor\Events\BuyProductFactorsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBuyProductFactorsTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        BuyProductFactorsListedEvent::dispatch($result);

        return $result;
    }
}
