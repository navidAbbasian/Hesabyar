<?php

namespace App\Containers\AppSection\FinancialReport\Events;

use App\Containers\AppSection\FinancialReport\Models\FinancialReport;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class FinancialReportsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $financialreport
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
