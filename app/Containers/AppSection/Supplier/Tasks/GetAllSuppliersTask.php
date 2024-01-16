<?php

namespace App\Containers\AppSection\Supplier\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Supplier\Data\Repositories\SupplierRepository;
use App\Containers\AppSection\Supplier\Events\SuppliersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSuppliersTask extends ParentTask
{
    public function __construct(
        protected SupplierRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        SuppliersListedEvent::dispatch($result);

        return $result;
    }
}
