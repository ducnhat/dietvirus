<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Mail;

class SendReplyContactMessageEmail extends Job implements SelfHandling
{
    public $contact;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.contact', ['contact' => $this->contact], function ($message) {
            $message->from($this->contact->user->email, $this->contact->user->name);
            $message->to($this->contact->email);
            $message->subject(trans('new_product_key_email.title'));
        });
    }
}
