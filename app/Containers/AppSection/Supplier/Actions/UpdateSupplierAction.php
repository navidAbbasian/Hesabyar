<?php

namespace App\Containers\AppSection\Supplier\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Containers\AppSection\Supplier\Tasks\UpdateSupplierTask;
use App\Containers\AppSection\Supplier\UI\API\Requests\UpdateSupplierRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSupplierAction extends ParentAction
{
    /**
     * @param UpdateSupplierRequest $request
     * @return Supplier
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSupplierRequest $request): Supplier
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
            'website'
        ]);

        return app(UpdateSupplierTask::class)->run($data, $request->id);
    }
}
