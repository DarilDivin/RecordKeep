<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WithdrawDemandePretAfterDocumentBack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:withdraw-demande-pret-after-back';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "
        Cette Tâche se chargera de retirer(pas de supprimer)
        du listing des demandes de prêts quelques temps
        après, une demande de prêt une fois que  le document
        par lequel elle est concernée sera de retour.
    ";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
