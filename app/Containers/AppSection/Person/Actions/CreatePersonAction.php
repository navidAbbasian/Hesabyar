<?php

namespace App\Containers\AppSection\Person\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Person\Tasks\CreatePersonTask;
use App\Containers\AppSection\Person\UI\API\Requests\CreatePersonRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreatePersonAction extends ParentAction
{
    /**
     * @param CreatePersonRequest $request
     * @return Person
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreatePersonRequest $request): Person
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

        return app(CreatePersonTask::class)->run($data);
    }
}
