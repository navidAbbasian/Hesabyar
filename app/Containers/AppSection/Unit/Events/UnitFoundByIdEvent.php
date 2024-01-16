<?php

namespace App\Containers\AppSection\Unit\Events;

use App\Containers\AppSection\Unit\Models\Unit;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class UnitFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Unit $unit
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
