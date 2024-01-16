<?php

namespace App\Containers\AppSection\SellProductFactor\Events;

use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SellProductFactorFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public SellProductFactor $sellproductfactor
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
