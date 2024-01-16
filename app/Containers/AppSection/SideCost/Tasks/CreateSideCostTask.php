<?php

namespace App\Containers\AppSection\SideCost\Tasks;

use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\SideCost\Data\Repositories\SideCostRepository;
use App\Containers\AppSection\SideCost\Events\SideCostCreatedEvent;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateSideCostTask extends ParentTask
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
     * @throws CreateResourceFailedException
     */
    public function run(array $data): SideCost
    {
//        try {

        DB::beginTransaction();

        $sidecost = $this->repository->create($data);

        $transactionData = [
            'is_deposit' => '0',
            'type' => 6,
            'amount' => $data['amount'],
            'side_cost_id' => $sidecost->id
        ];

        if (isset($data['bank_id'])) {
            $transactionTypeId = [
                'bank_id' => $data['bank_id']
            ];

            /** update bank inventory */
            $bank = $this->bankRepository->find($data['bank_id']);
            $bank['inventory'] -= $data['amount'];

            $bank->save();

        } else if (isset($data['fund_id'])) {
            $transactionTypeId = [
                'fund_id' => $data['fund_id']
            ];

            /** update fund inventory */
            $fund = $this->fundRepository->find($data['fund_id']);
            $fund['inventory'] -= $data['amount'];

            $fund->save();
        }

        if (isset($data['user_id'])) {
            $transactionUserId = ['user_id' => $data['user_id']];
        } else {
            $transactionUserId = null;
        }

        if ($transactionUserId) {
            $transaction = array_merge($transactionTypeId, $transactionData, $transactionUserId);
        } else {
            $transaction = array_merge($transactionData, $transactionTypeId);
        }


        $this->transactionRepository->create($transaction);

        SideCostCreatedEvent::dispatch($sidecost);

        DB::commit();
        return $sidecost;
//        } catch (Exception) {
//            DB::rollBack();
//            throw new CreateResourceFailedException();
//        }
    }
}
