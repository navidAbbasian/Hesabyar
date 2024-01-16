<?php

namespace App\Containers\AppSection\SideIncome\Tasks;

use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\SideIncome\Data\Repositories\SideIncomeRepository;
use App\Containers\AppSection\SideIncome\Events\SideIncomeUpdatedEvent;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSideIncomeTask extends ParentTask
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
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): SideIncome
    {
        try {

            /** update transaction */
            $transaction = $this->transactionRepository->where('side_income_id', $id)->first();
            $transaction['amount'] = $data['amount'];

            if (isset($data['user_id'])) {

                /** update commission transaction */
                $seller = $this->userRepository->find($data['user_id']);
                $commission = ($data['amount'] * $seller['commission']) / 100;

                $this->transactionRepository->create([
                    'is_deposit' => '0',
                    'type' => 7,
                    'amount' => $commission,
                    'side_income_id' => $id,
                    'user_id' => $data['user_id']
                ]);

                /** update sub-commission transaction */
                if ($seller['parent_id'] != null) {
                    $salesManager = $this->userRepository->find($seller['parent_id']);

                    $sub_commission = ($data['amount'] * $salesManager['sub_commission']) / 100;

                    $this->transactionRepository->create([
                        'is_deposit' => 0,
                        'type' => 8,
                        'amount' => $sub_commission,
                        'side_income_id' => $id,
                        'user_id' => $salesManager['id']
                    ]);
                }

            }

            $transaction->save();

            $sideIncomeAmount = $this->repository->find($id);
            if (isset($data['bank_id'])){
                $bank = $this->bankRepository->find($data['bank_id']);
                $bank['inventory'] -= $sideIncomeAmount['amount'];
                $bank['inventory'] += $data['amount'];

                $bank->save();
            }else if ($data['fund_id']){
                $fund = $this->fundRepository->find($data['fund_id']);
                $fund['inventory'] -= $sideIncomeAmount['amount'];
                $fund['inventory'] += $data['amount'];

                $fund->save();
            }

            $sideincome = $this->repository->update($data, $id);
            SideIncomeUpdatedEvent::dispatch($sideincome);

            return $sideincome;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
