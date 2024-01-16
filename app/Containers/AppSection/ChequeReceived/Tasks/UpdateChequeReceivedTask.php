<?php

namespace App\Containers\AppSection\ChequeReceived\Tasks;

use App\Containers\AppSection\ChequeReceived\Data\Repositories\ChequeReceivedRepository;
use App\Containers\AppSection\ChequeReceived\Events\ChequeReceivedUpdatedEvent;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UpdateChequeReceivedTask extends ParentTask
{
    public function __construct(
        protected ChequeReceivedRepository $repository,
        protected TransactionRepository $transactionRepository

    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ChequeReceived
    {
//        try {

            $selectedReceiveCheque = $this->repository->find($id);
            if (isset($data['cheque_image']) && $data['cheque_image'] != null && $selectedReceiveCheque['cheque_image'] != null && Storage::disk('s3')->exists($selectedReceiveCheque['cheque_image'])) {
                Storage::disk('s3')->delete($selectedReceiveCheque['cheque_image']);
            }

            if (isset($data['cheque_image']) && $data['cheque_image'] != null) {
                $imageName = "images/" . time() . '.' . $data['cheque_image']->extension();
                $fileContent = file_get_contents($data['cheque_image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['cheque_image'] = $imageName;
            }

            $transaction = $this->transactionRepository->where('cheque_receive_id', $id)->first();
            $transaction['amount'] = $data['amount'];

            $transaction->save();

            $chequereceived = $this->repository->update($data, $id);
            ChequeReceivedUpdatedEvent::dispatch($chequereceived);

            return $chequereceived;
//        } catch (ModelNotFoundException) {
//            throw new NotFoundException();
//        } catch (Exception) {
//            throw new UpdateResourceFailedException();
//        }
    }
}
