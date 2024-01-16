<?php

namespace App\Containers\AppSection\Supplier\Events;

use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SupplierUpdatedEvent extends ParentEvent
{
    public function __construct(
        public Supplier $supplier
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
