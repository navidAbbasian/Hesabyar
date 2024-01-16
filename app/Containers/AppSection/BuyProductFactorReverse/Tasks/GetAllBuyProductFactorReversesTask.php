<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactorReverse\Events\BuyProductFactorReversesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBuyProductFactorReversesTask extends ParentTask
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
        $result = $this->addRequestCriteria()->repository->withTrashed()->where('reverse','1')->get();
        BuyProductFactorReversesListedEvent::dispatch($result);

        return $result;
    }
}
