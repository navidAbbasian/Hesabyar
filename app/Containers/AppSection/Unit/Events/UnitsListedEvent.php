<?php

namespace App\Containers\AppSection\Unit\Events;

use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class UnitsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $unit
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
