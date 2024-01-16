<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateSellerTask;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateSellerRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSellerAction extends ParentAction
{
    /**
     * @param UpdateUserRequest $request
     * @return User
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSellerRequest $request): User
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'image',
            'email'
        ]);

        return app(UpdateSellerTask::class)->run($data, $request->id);
    }
}
