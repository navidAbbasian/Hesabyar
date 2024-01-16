<?php

namespace App\Containers\AppSection\SellProductFactorReverse\Events;

use App\Containers\AppSection\SellProductFactorReverse\Models\SellProductFactorReverse;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SellProductFactorReverseFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public SellProductFactorReverse $sellproductfactorreverse
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
