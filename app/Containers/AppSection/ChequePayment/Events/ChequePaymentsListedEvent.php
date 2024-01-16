<?php

namespace App\Containers\AppSection\ChequePayment\Events;

use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ChequePaymentsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $chequepayment
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
