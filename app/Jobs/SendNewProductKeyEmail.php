<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class SendNewProductKeyEmail extends Job implements SelfHandling
{
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
        //
    }
}
