<?php

namespace App\Containers\AppSection\Person\Events;

use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class PersonCreatedEvent extends ParentEvent
{
    public function __construct(
        public Person $person
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
