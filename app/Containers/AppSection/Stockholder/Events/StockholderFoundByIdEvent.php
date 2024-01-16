<?php

namespace App\Containers\AppSection\Stockholder\Events;

use App\Containers\AppSection\Stockholder\Models\Stockholder;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class StockholderFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Stockholder $stockholder
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
