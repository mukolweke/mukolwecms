<?php

namespace App\Events;

use App\FinancialAdvisor;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Event;

class FinancialAdvisorWasCreated extends Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $financialAdvisor;

    public function __construct(FinancialAdvisor $financialAdvisor)
    {
        $this->financialAdvisor = $financialAdvisor;
        console.log('it works');
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
