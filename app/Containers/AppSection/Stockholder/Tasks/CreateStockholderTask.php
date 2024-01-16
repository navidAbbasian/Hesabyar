<?php

namespace App\Containers\AppSection\Stockholder\Tasks;

use App\Containers\AppSection\Stockholder\Data\Repositories\StockholderRepository;
use App\Containers\AppSection\Stockholder\Events\StockholderCreatedEvent;
use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;

class CreateStockholderTask extends ParentTask
{
    public function __construct(
        protected StockholderRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Stockholder
    {
        try {

            if (isset($data['image'])) {
                $imageName = "images/" . time() . '.' . $data['image']->extension();
                $fileContent = file_get_contents($data['image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['image'] = $imageName;

            }

            $stockholder = $this->repository->create($data);
            StockholderCreatedEvent::dispatch($stockholder);

            return $stockholder;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
