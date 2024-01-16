<?php

namespace App\Containers\AppSection\Person\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Person\Tasks\UpdatePersonTask;
use App\Containers\AppSection\Person\UI\API\Requests\UpdatePersonRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdatePersonAction extends ParentAction
{
    /**
     * @param UpdatePersonRequest $request
     * @return Person
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePersonRequest $request): Person
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'family',
            'image',
            'company_id',
            'person_category_id',
            'description',
            'country',
            'province',
            'city',
            'address',
            'postal_code',
            'phone_number',
            'telephone_number',
            'fax_number',
            'email',
            'website'
        ]);

        return app(UpdatePersonTask::class)->run($data, $request->id);
    }
}
