<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use Mail;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;


class SendProductKeyEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    use DispatchesJobs;

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
        if($this->order->checkOrderIsPaid()) {
            if ($this->order->checkOrderIsSentKeys() && $this->order->checkProductKeyQuantity()) {
                Mail::send('emails.product_keys', ['order' => $this->order], function ($message) {
                    $message->from('dondathang@phanmemquetvirut.com', 'Phần mềm quét virut');
                    $message->to($this->order->email);
                    $message->subject(trans('order.confirm_email_title'));
                });

                $this->order->sent_at = Carbon::now()->toDateTimeString();
                $this->order->save();
            } else {
                $job = (new SendDelayProductKeyEmail($this->order))->delay(1800);
                $this->dispatch($job);
            }
        }
    }
}
