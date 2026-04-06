<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendQrCode
{
    use Dispatchable, InteractsWithSockets, SerializesModels, ShouldBroadcast   ;

    public $uuid;
    public $qr      ;

    /**
     * Create a new event instance.
     */
    public function __construct($uuid, $qr)
    {
        $this->uuid = $uuid;
        $this->qr = $qr;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
