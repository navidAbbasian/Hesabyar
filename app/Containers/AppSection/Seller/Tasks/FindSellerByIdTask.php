<?php

namespace App\Containers\AppSection\Seller\Tasks;

use App\Containers\AppSection\Seller\Events\SellerFoundByIdEvent;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSellerByIdTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }


    /**
     * @throws NotFoundException
     */
    public function run($id): User
    {
        try {
            $seller = $this->repository->withTrashed()->where('type','1')->where('id', $id)->first();

            return $seller;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
