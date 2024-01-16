<?php

namespace App\Containers\AppSection\ChequeReceived\Events;

use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ChequeReceivedUpdatedEvent extends ParentEvent
{
    public function __construct(
        public ChequeReceived $chequereceived
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
