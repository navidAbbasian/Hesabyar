<?php

namespace App\Containers\AppSection\Seller\Events;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SellerFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Seller $seller
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
