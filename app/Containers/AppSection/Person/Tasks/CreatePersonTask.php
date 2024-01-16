<?php

namespace App\Containers\AppSection\Person\Tasks;

use App\Containers\AppSection\Person\Data\Repositories\PersonRepository;
use App\Containers\AppSection\Person\Events\PersonCreatedEvent;
use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;

class CreatePersonTask extends ParentTask
{
    public function __construct(
        protected PersonRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Person
    {
        try {

            if (isset($data['image'])) {
                $imageName = "images/" . time() . '.' . $data['image']->extension();
                $fileContent = file_get_contents($data['image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['image'] = $imageName;
            }

            $person = $this->repository->create($data);
            PersonCreatedEvent::dispatch($person);

            return $person;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
