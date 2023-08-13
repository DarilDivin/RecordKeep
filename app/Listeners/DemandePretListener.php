<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Events\DemandePretEvent;
use App\Mail\DocumentDemandeMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemandePretListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DemandePretEvent $event): void
    {
        // Mail::send(new DocumentDemandeMail($document, $request->validated()));
        // $this->mailer->send(new DocumentDemandeMail($event->document, $event->data));
    }
}
