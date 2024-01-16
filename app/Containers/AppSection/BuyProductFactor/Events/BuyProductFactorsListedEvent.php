<?php

namespace App\Containers\AppSection\BuyProductFactor\Events;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BuyProductFactorsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $buyproductfactor
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
