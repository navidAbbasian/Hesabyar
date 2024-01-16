<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CreateUserByCredentialsTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        try {
            if (isset($data['image'])){
                $imageName = "images/" . time() . '.' . $data['image']->extension();
                $fileContent = file_get_contents($data['image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['image'] = $imageName;
            }
            $user = $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }

        return $user;
    }
}
