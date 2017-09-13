<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/*Modelos*/

use App\Container\SportCit\Src\Organization;

class StateOrganizationModified
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $organization;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Organization $organization)
    {
        $this->$organization = $organization;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
