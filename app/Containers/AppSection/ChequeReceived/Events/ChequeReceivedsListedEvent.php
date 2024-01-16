<?php

namespace App\Containers\AppSection\ChequeReceived\Events;

use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ChequeReceivedsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $chequereceived
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
