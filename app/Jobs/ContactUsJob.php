<?php

namespace App\Jobs;

use App\Mail\ContactUsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ContactUsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $message)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send(new ContactUsMail($this->message));
    }
}