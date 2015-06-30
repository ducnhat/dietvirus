<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendProductKeyEmail;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendDelayProductKeyEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    use DispatchesJobs;

    public $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
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
        $job = (new SendProductKeyEmail($this->order))->delay(300);
        $this->dispatch($job);
    }
}
