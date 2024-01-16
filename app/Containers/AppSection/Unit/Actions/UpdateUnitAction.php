<?php

namespace App\Containers\AppSection\Unit\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Unit\Models\Unit;
use App\Containers\AppSection\Unit\Tasks\UpdateUnitTask;
use App\Containers\AppSection\Unit\UI\API\Requests\UpdateUnitRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateUnitAction extends ParentAction
{
    /**
     * @param UpdateUnitRequest $request
     * @return Unit
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateUnitRequest $request): Unit
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'unit',
            'amount',
        ]);

        return app(UpdateUnitTask::class)->run($data, $request->id);
    }
}
