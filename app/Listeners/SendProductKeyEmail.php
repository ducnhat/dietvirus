<?php

namespace App\Listeners;

use App\Events\OrderWasPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendProductKeyEmail as SendProductKey;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendProductKeyEmail implements ShouldQueue
{
    use DispatchesJobs;

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
        $order = $event->order;

        $job = (new SendProductKey($order));

        $this->dispatch($job);
    }
}
