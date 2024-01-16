<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\CreateTransactionAction;
use App\Containers\AppSection\Transaction\Actions\DeleteTransactionAction;
use App\Containers\AppSection\Transaction\Actions\FindTransactionByIdAction;
use App\Containers\AppSection\Transaction\Actions\GetAllTransactionsAction;
use App\Containers\AppSection\Transaction\Actions\UpdateTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\CreateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Requests\DeleteTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Requests\FindTransactionByIdRequest;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetAllTransactionsRequest;
use App\Containers\AppSection\Transaction\UI\API\Requests\UpdateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param CreateTransactionRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createTransaction(CreateTransactionRequest $request): JsonResponse
    {
        $transaction = app(CreateTransactionAction::class)->run($request);

        return $this->created($this->transform($transaction, TransactionTransformer::class));
    }

    /**
     * @param FindTransactionByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findTransactionById(FindTransactionByIdRequest $request): array
    {
        $transaction = app(FindTransactionByIdAction::class)->run($request);

        return $this->transform($transaction, (new TransactionTransformer())->setDefaultIncludes(['person',
            'user',
            'bank',
            'fund',
            'chequeReceive',
            'chequePayment',
            'sellProductFactor',
            'buyProductFactor',
            'sideIncome',
            'sideCost']));
    }

    /**
     * @param GetAllTransactionsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllTransactions(GetAllTransactionsRequest $request): array
    {
        $transactions = app(GetAllTransactionsAction::class)->run($request);

        return $this->transform($transactions, (new TransactionTransformer())->setDefaultIncludes(['person',
            'user',
            'bank',
            'fund',
            'chequeReceive',
            'chequePayment',
            'sellProductFactor',
            'buyProductFactor',
            'sideIncome',
            'sideCost']));
    }

    /**
     * @param UpdateTransactionRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateTransaction(UpdateTransactionRequest $request): array
    {
        $transaction = app(UpdateTransactionAction::class)->run($request);

        return $this->transform($transaction, TransactionTransformer::class);
    }

    /**
     * @param DeleteTransactionRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteTransaction(DeleteTransactionRequest $request): JsonResponse
    {
        app(DeleteTransactionAction::class)->run($request);

        return $this->noContent();
    }
}
