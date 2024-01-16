<?php

namespace App\Containers\AppSection\Company\Tasks;

use App\Containers\AppSection\Company\Data\Repositories\CompanyRepository;
use App\Containers\AppSection\Company\Events\CompanyUpdatedEvent;
use App\Containers\AppSection\Company\Models\Company;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UpdateCompanyTask extends ParentTask
{
    public function __construct(
        protected CompanyRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Company
    {
        try {

            $deleteImage = $this->repository->find($id);
            if (isset($data['logo']) && $data['logo'] != null && $deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['logo'])) {
                Storage::disk('s3')->delete($deleteImage['logo']);
            }

            if (isset($data['logo']) && $data['logo'] != null)
            {
                $imageName = "images/" . time() . '.' . $data['logo']->extension();
                $fileContent = file_get_contents($data['logo']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['logo'] = $imageName;
            }

            $company = $this->repository->update($data, $id);
            CompanyUpdatedEvent::dispatch($company);

            return $company;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
