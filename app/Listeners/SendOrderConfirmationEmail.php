<?php

namespace App\Listeners;

use App\Events\OrderWasAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendOrderConfirmationEmail implements ShouldQueue
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
     * @param  OrderWasAdded  $event
     * @return void
     */
    public function handle(OrderWasAdded $event)
    {
        $this->order = $event->order;

        Mail::send('emails.invoice', ['order' => $this->order], function($message){
            $message->from('order@phanmemquetvirut.com', 'Phần mềm quét virut');
            $message->to($this->order->email);
            $message->subject(trans('order.confirm_email_title'));
        });
    }
}
