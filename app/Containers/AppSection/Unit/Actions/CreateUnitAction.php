<?php

namespace App\Containers\AppSection\Unit\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Unit\Models\Unit;
use App\Containers\AppSection\Unit\Tasks\CreateUnitTask;
use App\Containers\AppSection\Unit\UI\API\Requests\CreateUnitRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateUnitAction extends ParentAction
{
    /**
     * @param CreateUnitRequest $request
     * @return Unit
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateUnitRequest $request): Unit
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'unit',
            'amount',
        ]);

        return app(CreateUnitTask::class)->run($data);
    }
}
