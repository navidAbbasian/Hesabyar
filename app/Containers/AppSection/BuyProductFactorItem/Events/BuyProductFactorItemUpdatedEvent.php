<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Events;

use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BuyProductFactorItemUpdatedEvent extends ParentEvent
{
    public function __construct(
        public BuyProductFactorItem $buyproductfactoritem
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
