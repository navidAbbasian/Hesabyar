<?php

namespace App\Containers\AppSection\SideIncome\Tasks;

use App\Containers\AppSection\SideIncome\Data\Repositories\SideIncomeRepository;
use App\Containers\AppSection\SideIncome\Events\SideIncomeFoundByIdEvent;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSideIncomeByIdTask extends ParentTask
{
    public function __construct(
        protected SideIncomeRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): SideIncome
    {
        try {
            $sideincome = $this->repository->withTrashed()->find($id);
            SideIncomeFoundByIdEvent::dispatch($sideincome);

            return $sideincome;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
