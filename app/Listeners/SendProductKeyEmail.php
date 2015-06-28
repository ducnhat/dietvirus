<?php

namespace App\Listeners;

use App\Events\OrderWasPurchased;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendProductKeyEmail implements ShouldQueue
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
     * @param  OrderWasPurchased  $event
     * @return void
     */
    public function handle(OrderWasPurchased $event)
    {
        $this->order = $event->order;

        Mail::send('emails.product_keys', ['order' => $this->order], function($message){
            $message->from('dondathang@phanmemquetvirut.com', 'Phần mềm quét virut');
            $message->to($this->order->email);
            $message->subject(trans('order.confirm_email_title'));
        });

        $this->order->sent_at = Carbon::now()->toDateTimeString();
        $this->order->save();
    }
}
