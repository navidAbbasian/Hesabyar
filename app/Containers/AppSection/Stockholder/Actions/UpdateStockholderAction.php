<?php

namespace App\Containers\AppSection\Stockholder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Containers\AppSection\Stockholder\Tasks\UpdateStockholderTask;
use App\Containers\AppSection\Stockholder\UI\API\Requests\UpdateStockholderRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateStockholderAction extends ParentAction
{
    /**
     * @param UpdateStockholderRequest $request
     * @return Stockholder
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateStockholderRequest $request): Stockholder
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

        return app(UpdateStockholderTask::class)->run($data, $request->id);
    }
}
