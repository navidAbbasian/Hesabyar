<?php

namespace App\Containers\AppSection\ChequeReceived\Tasks;

use App\Containers\AppSection\ChequeReceived\Data\Repositories\ChequeReceivedRepository;
use App\Containers\AppSection\ChequeReceived\Events\ChequeReceivedCreatedEvent;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateChequeReceivedTask extends ParentTask
{
    public function __construct(
        protected ChequeReceivedRepository $repository,
        protected TransactionRepository $transactionRepository

    )
    {
    }

    /**
     * @throws CreateResourceFailedException|ValidatorException
     */
    public function run(array $data): ChequeReceived
    {
//        try {

            if (isset($data['cheque_image'])) {
                $imageName = "images/" . time() . '.' . $data['cheque_image']->extension();
                $fileContent = file_get_contents($data['cheque_image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['cheque_image'] = $imageName;
            }

            $chequereceived = $this->repository->create($data);

            /** create transaction */
            $this->transactionRepository->create([
                'is_deposit' => 1,
                'type' => 3,
                'amount' => $data['amount'],
                'person_id' => $data['person_id'],
                'user_id' => $data['user_id'] ?? null,
                'cheque_receive_id' => $chequereceived->id
            ]);

            ChequeReceivedCreatedEvent::dispatch($chequereceived);

            return $chequereceived;

//        } catch (Exception) {
//            throw new CreateResourceFailedException();
//        }
    }
}
