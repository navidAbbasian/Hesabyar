<?php

namespace App\Containers\AppSection\SideCostCategory\Events;

use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SideCostCategoryUpdatedEvent extends ParentEvent
{
    public function __construct(
        public SideCostCategory $sidecostcategory
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
