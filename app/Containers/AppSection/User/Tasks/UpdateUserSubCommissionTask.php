<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateUserSubCommissionTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data): User
    {
//        try {

            $saleManager = $this->repository->find($data['id']);
            $saleManager['sub_commission'] = $data['sub_commission'];

            $saleManager->save();

            return $saleManager;/*$this->repository->update($data, $id);*/
//        } catch (ModelNotFoundException) {
//            throw new NotFoundException();
//        } catch (Exception) {
//            throw new UpdateResourceFailedException();
//        }
    }
}
