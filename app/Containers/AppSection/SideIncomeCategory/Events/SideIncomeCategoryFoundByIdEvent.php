<?php

namespace App\Containers\AppSection\SideIncomeCategory\Events;

use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SideIncomeCategoryFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public SideIncomeCategory $sideincomecategory
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
