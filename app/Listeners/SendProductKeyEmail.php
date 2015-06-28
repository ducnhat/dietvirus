<?php

namespace App\Listeners;

use App\Events\OrderWasPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProductKeyEmail
{
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
     * @param  OrderWasPurchased  $event
     * @return void
     */
    public function handle(OrderWasPurchased $event)
    {
        dd($event->order);
    }
}
