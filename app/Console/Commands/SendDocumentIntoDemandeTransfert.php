<?php

namespace App\Console\Commands;

use App\Models\DemandeTransfert;
use Carbon\Carbon;
use App\Models\Document;
use App\Models\Fonction;
use Illuminate\Console\Command;

class SendDocumentIntoDemandeTransfert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-document-into-demande-transfert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Cette Tâche se chargera d'insérer automatiquement un document dans la Demande de Transfert du Mois une fois sa DUA aux Bureaux écoulée";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $documents = Document::where("standardDUAFinished", "<", now())->get();
        foreach ($documents as $k => $document) {
            $demandeTransfert = DemandeTransfert::where('direction_id', $document->direction_id)->get();
            $document->update([
                'demande_transfert_id' => $demandeTransfert[0]->id
            ]);
        }
    }
}
