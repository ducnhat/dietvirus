<?php

namespace App\Listeners;

use App\Events\DelaySendProductKey;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDelayProductKeyEmail implements ShouldQueue
{
    public $order;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DelaySendProductKey  $event
     * @return void
     */
    public function handle(DelaySendProductKey $event)
    {
        $this->order = $event->order;

        dd($this->order);
    }
}
