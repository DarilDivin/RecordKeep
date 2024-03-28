<?php

namespace App\Providers;

use App\Events\DemandePretEvent;
use App\Events\AcceptDemandeEvent;
use App\Events\RejectDemandeEvent;
use Illuminate\Support\Facades\Event;
use App\Listeners\DemandePretListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\AcceptDemandeListener;
use App\Listeners\RejectDemandeListener;
use App\Listeners\SendEmailVerificationListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            /* SendEmailVerificationNotification::class, */
            SendEmailVerificationListener::class
        ],
        DemandePretEvent::class => [DemandePretListener::class],
        AcceptDemandeEvent::class => [AcceptDemandeListener::class],
        RejectDemandeEvent::class => [RejectDemandeListener::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
