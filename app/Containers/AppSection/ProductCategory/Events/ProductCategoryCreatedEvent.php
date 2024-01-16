<?php

namespace App\Containers\AppSection\ProductCategory\Events;

use App\Containers\AppSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ProductCategoryCreatedEvent extends ParentEvent
{
    public function __construct(
        public ProductCategory $productcategory
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
