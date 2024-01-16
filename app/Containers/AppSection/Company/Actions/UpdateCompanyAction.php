<?php

namespace App\Containers\AppSection\Company\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Company\Models\Company;
use App\Containers\AppSection\Company\Tasks\UpdateCompanyTask;
use App\Containers\AppSection\Company\UI\API\Requests\UpdateCompanyRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCompanyAction extends ParentAction
{
    /**
     * @param UpdateCompanyRequest $request
     * @return Company
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCompanyRequest $request): Company
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'logo',
            'registration_number',
            'country',
            'province',
            'city',
            'phone',
            'email',
            'website',
            'national_id',
            'economic_code',
        ]);

        return app(UpdateCompanyTask::class)->run($data, $request->id);
    }
}
