<?php

namespace App\Containers\AppSection\Bank\Events;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BanksListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $bank
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
