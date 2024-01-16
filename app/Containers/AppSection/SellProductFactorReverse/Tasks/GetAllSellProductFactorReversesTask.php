<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactorReverse\Data\Repositories\SellProductFactorReverseRepository;
use App\Containers\AppSection\SellProductFactorReverse\Events\SellProductFactorReversesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellProductFactorReversesTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->where('reverse', '1')->get();
        SellProductFactorReversesListedEvent::dispatch($result);

        return $result;
    }
}
