<?php

namespace App\Containers\AppSection\SellProductFactor\Tasks;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SellProductFactor\Events\SellProductFactorDeletedEvent;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteSellProductFactorTask extends ParentTask
{
    public function __construct(
        protected SellProductFactorRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {

            $sellProductFactorItem = SellProductFactorItem::where('factor_id', $id)->get();

            for ($i = 0; $i < count($sellProductFactorItem); $i++) {
                $updateProductInventory = Product::where('id', $sellProductFactorItem[$i]['product_id'])->withTrashed()->first();
                $updateProductInventory['quantity'] += $sellProductFactorItem[$i]['quantity'];

                $updateProductInventory->save();
            }

            $result = $this->repository->delete($id);
            SellProductFactorDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
