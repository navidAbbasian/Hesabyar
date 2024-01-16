<?php

namespace App\Containers\AppSection\SideCost\Tasks;

use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SideCost\Data\Repositories\SideCostRepository;
use App\Containers\AppSection\SideCost\Events\SideCostUpdatedEvent;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSideCostTask extends ParentTask
{
    public function __construct(
        protected SideCostRepository    $repository,
        protected TransactionRepository $transactionRepository,
        protected BankRepository        $bankRepository,
        protected FundRepository        $fundRepository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): SideCost
    {
        try {


            /** update transaction */
            $transaction = $this->transactionRepository->where('side_cost_id', $id)->first();
            $transaction['amount'] = $data['amount'];

            $transaction->save();


            $sideCostAmount = $this->repository->find($id);
            if (isset($data['bank_id'])) {
                $bank = $this->bankRepository->find($data['bank_id']);
                $bank['inventory'] += $sideCostAmount['amount'];
                $bank['inventory'] -= $data['amount'];

                $bank->save();
            } else if ($data['fund_id']) {
                $fund = $this->fundRepository->find($data['fund_id']);
                $fund['inventory'] += $sideCostAmount['amount'];
                $fund['inventory'] -= $data['amount'];

                $fund->save();
            }

            $sidecost = $this->repository->update($data, $id);
            SideCostUpdatedEvent::dispatch($sidecost);

            return $sidecost;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
