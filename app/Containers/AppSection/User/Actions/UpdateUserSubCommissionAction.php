<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateUserSubCommissionTask;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserSubCommissionRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateUserSubCommissionAction extends ParentAction
{
    /**
     * @param UpdateUserSubCommissionRequest $request
     * @return User
     * @throws IncorrectIdException
     */
    public function run(UpdateUserSubCommissionRequest $request): User
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'sub_commission',
            'id'
        ]);

        return app(UpdateUserSubCommissionTask::class)->run($data);
    }
}
