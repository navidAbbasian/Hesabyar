<?php

namespace App\Containers\AppSection\Fund\Tasks;

use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\Fund\Events\FundCreatedEvent;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateFundTask extends ParentTask
{
    public function __construct(
        protected FundRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Fund
    {
        try {
            $fund = $this->repository->create($data);
            FundCreatedEvent::dispatch($fund);

            return $fund;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
