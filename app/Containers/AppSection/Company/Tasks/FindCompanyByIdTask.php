<?php

namespace App\Containers\AppSection\Company\Tasks;

use App\Containers\AppSection\Company\Data\Repositories\CompanyRepository;
use App\Containers\AppSection\Company\Events\CompanyFoundByIdEvent;
use App\Containers\AppSection\Company\Models\Company;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCompanyByIdTask extends ParentTask
{
    public function __construct(
        protected CompanyRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Company
    {
        try {
            $company = $this->repository->withTrashed()->find($id);
            CompanyFoundByIdEvent::dispatch($company);

            return $company;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
