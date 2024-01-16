<?php

namespace App\Containers\AppSection\Stockholder\Tasks;

use App\Containers\AppSection\Stockholder\Data\Repositories\StockholderRepository;
use App\Containers\AppSection\Stockholder\Events\StockholderUpdatedEvent;
use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UpdateStockholderTask extends ParentTask
{
    public function __construct(
        protected StockholderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Stockholder
    {
        try {

            $deleteImage = $this->repository->find($id);
            if ($deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['image'])) {
                Storage::disk('s3')->delete($deleteImage['image']);
            }

            if (isset($data['image'])) {
                $imageName = "images/" . time() . '.' . $data['image']->extension();
                $fileContent = file_get_contents($data['image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['image'] = $imageName;
            }

            $stockholder = $this->repository->update($data, $id);
            StockholderUpdatedEvent::dispatch($stockholder);

            return $stockholder;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
