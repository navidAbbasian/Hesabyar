<?php

namespace App\Containers\AppSection\Company\Tasks;

use App\Containers\AppSection\Company\Data\Repositories\CompanyRepository;
use App\Containers\AppSection\Company\Events\CompanyDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class DeleteCompanyTask extends ParentTask
{
    public function __construct(
        protected CompanyRepository $repository
    )
    {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {

            $deleteImage = $this->repository->find($id);
            if ($deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['logo'])) {
                Storage::disk('s3')->delete($deleteImage['logo']);
            }

            $result = $this->repository->delete($id);
            CompanyDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
