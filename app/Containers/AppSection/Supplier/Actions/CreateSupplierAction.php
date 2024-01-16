<?php

namespace App\Containers\AppSection\Supplier\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Containers\AppSection\Supplier\Tasks\CreateSupplierTask;
use App\Containers\AppSection\Supplier\UI\API\Requests\CreateSupplierRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSupplierAction extends ParentAction
{
    /**
     * @param CreateSupplierRequest $request
     * @return Supplier
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSupplierRequest $request): Supplier
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

        return app(CreateSupplierTask::class)->run($data);
    }
}
