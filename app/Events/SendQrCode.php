<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendQrCode
{
    use Dispatchable, SerializesModels;

    public $uuid;
    public $qr;

    /**
     * Create a new event instance.
     */
    public function __construct($uuid, $qr)
    {
        $this->uuid = $uuid;
        $this->qr = $qr;
    }
}
