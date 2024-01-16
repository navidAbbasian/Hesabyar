<?php

namespace App\Containers\AppSection\BuyProductFactorReverse\Events;

use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BuyProductFactorReverseFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public mixed $buyproductfactorreverse
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
