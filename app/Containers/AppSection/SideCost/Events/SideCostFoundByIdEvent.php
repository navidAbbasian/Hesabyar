<?php

namespace App\Containers\AppSection\SideCost\Events;

use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SideCostFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public SideCost $sidecost
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
