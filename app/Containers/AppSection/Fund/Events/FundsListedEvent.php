<?php

namespace App\Containers\AppSection\Fund\Events;

use App\Containers\AppSection\Fund\Models\Fund;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class FundsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $fund
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
