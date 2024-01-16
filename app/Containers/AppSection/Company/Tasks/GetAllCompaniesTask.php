<?php

namespace App\Containers\AppSection\Company\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Company\Data\Repositories\CompanyRepository;
use App\Containers\AppSection\Company\Events\CompaniesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCompaniesTask extends ParentTask
{
    public function __construct(
        protected CompanyRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        CompaniesListedEvent::dispatch($result);

        return $result;
    }
}
