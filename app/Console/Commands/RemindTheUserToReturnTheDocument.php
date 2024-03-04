<?php

namespace App\Console\Commands;

use App\Jobs\RemindTheUserToReturnTheDocumentJob;
use App\Models\DemandePret;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemindTheUserToReturnTheDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remind-the-user-to-return-the-document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "
        Cette tâche se chargera via un mail de rappeller à
        l'utilisateur qu'il doit ramener le document une
        fois la durée du prêt écoulée
    ";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (DemandePret::where('etat', 'Terminé')->get() as $demande) {
            if (Carbon::now()->addDays($demande->duree)->isPast())
            RemindTheUserToReturnTheDocumentJob::dispatch($demande->user->email);
        }
    }
}
