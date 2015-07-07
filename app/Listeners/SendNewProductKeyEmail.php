<?php

namespace App\Listeners;

use App\Events\ProductKeyWasWarranted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\SendNewProductKeyEmail as SendNewProductKey;

class SendNewProductKeyEmail
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
     * @param  ProductKeyWasWarranted  $event
     * @return void
     */
    public function handle(ProductKeyWasWarranted $event)
    {
        $keyWarranty = $event->keyWarranty;

        $job = (new SendNewProductKey($keyWarranty));

        $this->dispatch($job);
    }
}
