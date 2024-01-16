<?php

namespace App\Containers\AppSection\SellProductFactorItem\Events;

use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SellProductFactorItemDeletedEvent extends ParentEvent
{
    public function __construct(
        public int $result
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
