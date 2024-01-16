<?php

namespace App\Containers\AppSection\SellProductFactorItem\Events;

use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SellProductFactorItemsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $sellproductfactoritem
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
