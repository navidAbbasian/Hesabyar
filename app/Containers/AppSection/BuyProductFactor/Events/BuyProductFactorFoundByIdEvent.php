<?php

namespace App\Containers\AppSection\BuyProductFactor\Events;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BuyProductFactorFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public BuyProductFactor $buyproductfactor
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
