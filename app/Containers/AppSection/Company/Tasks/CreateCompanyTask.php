<?php

namespace App\Containers\AppSection\Company\Tasks;

use App\Containers\AppSection\Company\Data\Repositories\CompanyRepository;
use App\Containers\AppSection\Company\Events\CompanyCreatedEvent;
use App\Containers\AppSection\Company\Models\Company;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;

class CreateCompanyTask extends ParentTask
{
    public function __construct(
        protected CompanyRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Company
    {
        try {

            if (isset($data['logo']))
            {
                $imageName = "images/" . time() . '.' . $data['logo']->extension();
                $fileContent = file_get_contents($data['logo']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['logo'] = $imageName;
            }

            $company = $this->repository->create($data);
            CompanyCreatedEvent::dispatch($company);

            return $company;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
