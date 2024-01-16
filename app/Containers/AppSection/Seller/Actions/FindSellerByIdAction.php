<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Containers\AppSection\Seller\Tasks\FindSellerByIdTask;
use App\Containers\AppSection\Seller\UI\API\Requests\FindSellerByIdRequest;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSellerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSellerByIdRequest $request): User
    {
        return app(FindSellerByIdTask::class)->run($request->id);
    }
}
