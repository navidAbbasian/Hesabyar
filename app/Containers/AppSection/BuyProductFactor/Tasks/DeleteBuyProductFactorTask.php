<?php

namespace App\Containers\AppSection\BuyProductFactor\Tasks;

use App\Containers\AppSection\BuyProductFactor\Data\Repositories\BuyProductFactorRepository;
use App\Containers\AppSection\BuyProductFactor\Events\BuyProductFactorDeletedEvent;
use App\Containers\AppSection\BuyProductFactorItem\Data\Repositories\BuyProductFactorItemRepository;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteBuyProductFactorTask extends ParentTask
{
    public function __construct(
        protected BuyProductFactorRepository $repository,
//        protected BuyProductFactorItemRepository $buyProductFactorItemRepository
    )
    {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {

        $buyProductFactorItem = BuyProductFactorItem::where('factor_id', $id)->get();

        for ($i = 0; $i < count($buyProductFactorItem); $i++) {
            $updateProductInventory = Product::where('id', $buyProductFactorItem[$i]['product_id'])->withTrashed()->first();
            $updateProductInventory['quantity'] -= $buyProductFactorItem[$i]['quantity'];

            $updateProductInventory->save();
        }


        $result = $this->repository->delete($id);
        BuyProductFactorDeletedEvent::dispatch($result);

        return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
