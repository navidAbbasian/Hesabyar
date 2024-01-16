<?php

namespace App\Containers\AppSection\SellProductFactor\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactor\Events\SellProductFactorsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellProductFactorsTask extends ParentTask
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
        if (auth()->user()->type === 1){
            return $this->addRequestCriteria()->repository->where('user_id', auth()->id())->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        }
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        SellProductFactorsListedEvent::dispatch($result);

        return $result;
    }
}
