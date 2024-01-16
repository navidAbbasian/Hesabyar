<?php

namespace App\Containers\AppSection\Person\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Person\Data\Repositories\PersonRepository;
use App\Containers\AppSection\Person\Events\PeopleListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPeopleTask extends ParentTask
{
    public function __construct(
        protected PersonRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->withTrashed()->paginate(env("PAGINATION_LIMIT_DEFAULT"));
        PeopleListedEvent::dispatch($result);

        return $result;
    }
}
