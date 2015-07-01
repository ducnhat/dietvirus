<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductKeyWasWarranted extends Event
{
    use SerializesModels;

    public  $keyWarranty;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($keyWarranty)
    {
        $this->keyWarranty = $keyWarranty;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
