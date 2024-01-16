<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UpdateUserTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @param array $userData
     * @param $userId
     * @return User
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $userData, $userId): User
    {
        try {
            if (array_key_exists('password', $userData)) {
                $userData['password'] = Hash::make($userData['password']);

                $deleteImage = $this->repository->find($userId);
                if (isset($userData['image']) && $userData['image'] != null && $deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['image'])) {
                    Storage::disk('s3')->delete($deleteImage['image']);
                }

                if (isset($userData['image']) && $userData['image'] != null) {
                    $imageName = "images/" . time() . '.' . $userData['image']->extension();
                    $fileContent = file_get_contents($userData['image']);
                    Storage::disk('s3')->put($imageName, $fileContent);
                    $userData['image'] = $imageName;
                }

            }

            return $this->repository->update($userData, $userId);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
