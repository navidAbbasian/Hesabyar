<?php

namespace App\Containers\AppSection\Fund\Tasks;

use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\Fund\Events\FundFoundByIdEvent;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindFundByIdTask extends ParentTask
{
    public function __construct(
        protected FundRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Fund
    {
        try {
            $fund = $this->repository->withTrashed()->find($id);
            FundFoundByIdEvent::dispatch($fund);

            return $fund;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
