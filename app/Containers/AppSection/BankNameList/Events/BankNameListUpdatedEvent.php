<?php

namespace App\Containers\AppSection\BankNameList\Events;

use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BankNameListUpdatedEvent extends ParentEvent
{
    public function __construct(
        public BankNameList $banknamelist
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
