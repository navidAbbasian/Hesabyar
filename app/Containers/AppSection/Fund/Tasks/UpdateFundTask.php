<?php

namespace App\Containers\AppSection\Fund\Tasks;

use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\Fund\Events\FundUpdatedEvent;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFundTask extends ParentTask
{
    public function __construct(
        protected FundRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Fund
    {
        try {
            $fund = $this->repository->update($data, $id);
            FundUpdatedEvent::dispatch($fund);

            return $fund;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
