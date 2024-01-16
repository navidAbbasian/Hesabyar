<?php

namespace App\Containers\AppSection\Person\Tasks;

use App\Containers\AppSection\Person\Data\Repositories\PersonRepository;
use App\Containers\AppSection\Person\Events\PersonUpdatedEvent;
use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UpdatePersonTask extends ParentTask
{
    public function __construct(
        protected PersonRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Person
    {
        try {

            $deleteImage = $this->repository->find($id);
            if (isset($data['image']) && $data['image'] != null &&$deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['image'])) {
                Storage::disk('s3')->delete($deleteImage['image']);
            }

            if (isset($data['image']) && $data['image'] != null) {
                $imageName = "images/" . time() . '.' . $data['image']->extension();
                $fileContent = file_get_contents($data['image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['image'] = $imageName;
            }

            $person = $this->repository->update($data, $id);
            PersonUpdatedEvent::dispatch($person);

            return $person;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
