<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendDelayNewProductKeyEmail extends Job implements SelfHandling
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
        $job = (new SendNewProductKeyEmail($this->keyWarranty))->delay(300);
        $this->dispatch($job);
    }
}
