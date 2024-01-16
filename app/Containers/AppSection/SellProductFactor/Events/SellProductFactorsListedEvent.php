<?php

namespace App\Containers\AppSection\SellProductFactor\Events;

use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SellProductFactorsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $sellproductfactor
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
