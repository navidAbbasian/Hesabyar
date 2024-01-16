<?php

namespace App\Containers\AppSection\SideIncome\Tasks;

use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\SideIncome\Data\Repositories\SideIncomeRepository;
use App\Containers\AppSection\SideIncome\Events\SideIncomeCreatedEvent;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateSideIncomeTask extends ParentTask
{
    public function __construct(
        protected SideIncomeRepository  $repository,
        protected TransactionRepository $transactionRepository,
        protected UserRepository        $userRepository,
        protected BankRepository        $bankRepository,
        protected FundRepository        $fundRepository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): SideIncome
    {
        try {

            DB::beginTransaction();

            $sideincome = $this->repository->create($data);

            /** crete income transaction */
            $transactionData = [
                'is_deposit' => '1',
                'type' => 5,
                'user_id' => $data['user_id'],
                'amount' => $data['amount'],
                'side_income_id' => $sideincome->id
            ];

            if (isset($data['bank_id'])) {
                $transactionUserId = [
                    'bank_id' => $data['bank_id']
                ];

                /** update bank inventory */
                $bank = $this->bankRepository->find($data['bank_id']);
                $bank['inventory'] += $data['amount'];

                $bank->save();

            } else if (isset($data['fund_id'])) {
                $transactionUserId = [
                    'fund_id' => $data['fund_id']
                ];

                /** update fund inventory */
                $fund = $this->fundRepository->find($data['fund_id']);
                $fund['inventory'] += $data['amount'];

                $fund->save();
            }

            $transaction = array_merge($transactionUserId, $transactionData);

            $this->transactionRepository->create($transaction);


            if (isset($data['user_id'])) {

                /** create commission transaction */
                $seller = $this->userRepository->find($data['user_id']);
                $commission = ($data['amount'] * $seller['commission']) / 100;

                $this->transactionRepository->create([
                    'is_deposit' => '0',
                    'type' => 7,
                    'amount' => $commission,
                    'side_income_id' => $sideincome->id,
                    'user_id' => $data['user_id']
                ]);

                /** create sub-commission transaction */
                if ($seller['parent_id'] != null) {
                    $salesManager = $this->userRepository->find($seller['parent_id']);

                    $sub_commission = ($data['amount'] * $salesManager['sub_commission']) / 100;

                    $this->transactionRepository->create([
                        'is_deposit' => 0,
                        'type' => 8,
                        'amount' => $sub_commission,
                        'side_income_id' => $sideincome->id,
                        'user_id' => $salesManager['id']
                    ]);
                }

            }
            SideIncomeCreatedEvent::dispatch($sideincome);
            DB::commit();
            return $sideincome;
        } catch (Exception) {
            DB::rollBack();
            throw new CreateResourceFailedException();
        }
    }
}
