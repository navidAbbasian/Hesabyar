<?php

namespace App\Containers\AppSection\SideIncome\Events;

use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SideIncomeFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public SideIncome $sideincome
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
