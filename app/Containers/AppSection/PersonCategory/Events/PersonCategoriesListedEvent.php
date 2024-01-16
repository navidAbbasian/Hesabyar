<?php

namespace App\Containers\AppSection\PersonCategory\Events;

use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class PersonCategoriesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $personcategory
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
