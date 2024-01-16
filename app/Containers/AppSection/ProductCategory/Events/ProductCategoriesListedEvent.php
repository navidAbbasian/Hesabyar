<?php

namespace App\Containers\AppSection\ProductCategory\Events;

use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ProductCategoriesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $productcategory
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
