<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\OrderWasAdded;
use App\Listeners\SendOrderConfirmationEmail;
use App\Events\OrderWasPurchased;
use App\Listeners\SendProductKeyEmail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderWasAdded::class => [
            SendOrderConfirmationEmail::class
        ],
        OrderWasPurchased::class => [
            SendProductKeyEmail::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
