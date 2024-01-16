<?php

namespace App\Containers\AppSection\Transaction\Events;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TransactionsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $transaction
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
