<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Mail;

class SendUserActiveEmail extends Job implements SelfHandling
{
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.active', ['user' => $this->user], function ($message) {
            $message->from('account@phanmemquetvirut.com', 'Phần mềm quét virut');
            $message->to($this->user->email);
            $message->subject(trans('user\active_email.title'));
        });
    }
}
