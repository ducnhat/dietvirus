<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Order;
use App\OrderItems;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendOrderConfirmEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.invoice', ['order' => $this->order], function($message){
            $message->from('order@phanmemquetvirut.com', 'Phần mềm quét virut');
            $message->to($this->order->email);
            $message->subject(trans('order.confirm_email_title'));
        });
    }
}
