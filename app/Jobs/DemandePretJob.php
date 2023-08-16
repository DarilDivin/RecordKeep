<?php

namespace App\Jobs;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use App\Mail\DocumentDemandeMail;
use App\Models\DemandePret;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DemandePretJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public DemandePret $demande)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // dd($this->demande);
        // dd(route('document.demande.accept', ['demande' => $this->demande]));
        Mail::send(new DocumentDemandeMail($this->demande));
    }
}
