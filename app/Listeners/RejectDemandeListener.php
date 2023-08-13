<?php

namespace App\Listeners;

use App\Events\RejectDemandeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RejectDemandeListener
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
    public function handle(RejectDemandeEvent $event): void
    {
        //
    }
}
