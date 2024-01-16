<?php

namespace App\Containers\AppSection\Stockholder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Containers\AppSection\Stockholder\Tasks\CreateStockholderTask;
use App\Containers\AppSection\Stockholder\UI\API\Requests\CreateStockholderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateStockholderAction extends ParentAction
{
    /**
     * @param CreateStockholderRequest $request
     * @return Stockholder
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateStockholderRequest $request): Stockholder
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'family',
            'image'=>'image',
            'company_id',
            'alias',
            'national_id',
            'economic_code',
            'registration_number',
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

        return app(CreateStockholderTask::class)->run($data);
    }
}
