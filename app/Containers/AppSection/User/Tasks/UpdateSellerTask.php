<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UpdateSellerTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): User
    {
//        try {

            $seller = $this->repository->find($id);

        if ($seller['image'] != null && Storage::disk('s3')->exists($seller['image'])) {
            Storage::disk('s3')->delete($seller['image']);
        }

        if (isset($data['image'])) {
            $imageName = "images/" . time() . '.' . $data['image']->extension();
            $fileContent = file_get_contents($data['image']);
            Storage::disk('s3')->put($imageName, $fileContent);
            $seller['image'] = $imageName;
        }

            $seller['name'] = $data['name'];
            $seller['email'] = $data['email'];

            $seller->save();

            return $seller;/*$this->repository->update($data, $id);*/
//        } catch (ModelNotFoundException) {
//            throw new NotFoundException();
//        } catch (Exception) {
//            throw new UpdateResourceFailedException();
//        }
    }
}
