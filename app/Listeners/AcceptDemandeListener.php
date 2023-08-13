<?php

namespace App\Listeners;

use App\Events\AcceptDemandeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AcceptDemandeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AcceptDemandeEvent $event): void
    {
        //
    }
}
