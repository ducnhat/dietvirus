<?php

namespace App\Listeners;

use App\Events\ContactWasReplied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendReplyContactMessageEmail as SendReplyContactMessage;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendReplyContactMessageEmail
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
     * @param  Events  $event
     * @return void
     */
    public function handle(ContactWasReplied $event)
    {
        $contact = $event->contact;

        $job = (new SendReplyContactMessage($contact));

        $this->dispatch($job);
    }
}
