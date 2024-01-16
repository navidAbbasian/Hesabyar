<?php

namespace App\Containers\AppSection\Dashboard\Events;

use App\Containers\AppSection\Dashboard\Models\Dashboard;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class DashboardsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $dashboard
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
