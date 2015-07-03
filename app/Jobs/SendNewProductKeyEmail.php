<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Mail;
use App\ProductKey;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\SendDelayNewProductKeyEmail;

class SendNewProductKeyEmail extends Job implements SelfHandling
{
    use DispatchesJobs;

    public $keyWarranty;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($keyWarranty)
    {
        $this->keyWarranty = $keyWarranty;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $count = ProductKey::countProductKey($this->keyWarranty->productKey->product_id)->first();

        if($this->keyWarranty->is_warranted) {
            if ($count->quantity > 0) {
                $new_key = $this->keyWarranty->productKey->getNewProductKey();

                Mail::send('emails.new_product_key', ['keyWarranty' => $this->keyWarranty, 'key' => $new_key], function ($message) {
                    $message->from('baohanh@phanmemquetvirut.com', 'Phần mềm quét virut');
                    $message->to($this->keyWarranty->email);
                    $message->subject(trans('new_product_key_email.title'));
                });

                $this->keyWarranty->new_product_key_id = $new_key->id;
                $this->keyWarranty->save();
            } else {
                $job = (new SendDelayNewProductKeyEmail($this->keyWarranty))->delay(1800);
                $this->dispatch($job);
            }
        }
    }
}
