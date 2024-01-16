<?php

namespace App\Containers\AppSection\Company\Events;

use App\Containers\AppSection\Company\Models\Company;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CompanyFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Company $company
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
