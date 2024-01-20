<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteDemandeTransfertAfterValidation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-demande-transfert-after-validation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Cette Tâche se chargera de supprimer quelques temps après une demande de Transfert une fois que celle ci sera validée";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
