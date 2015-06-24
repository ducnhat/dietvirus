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
        Mail::send('emails.order', ['order' => $this->order->toArray()], function($message){
            $message->from('ddnhat@gmail.com', 'Nhật Đỗ');
            $message->to('nhatdo@outlook.com')->cc('ddnhat@gmail.com');
            $message->subject('Xác nhận đơn hàng');
        });
    }
}
