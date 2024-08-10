<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Document;
use App\Models\Statistique;
use Illuminate\Console\Command;

class EnregistrerStatistiquesMensuelles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:enregistrer-statistiques-mensuelles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "
        Cette tâche se charge d'enrégistrer les
        statistiques mensuelles à utiliser sur le Dashboard
    ";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $valeurMensuelle = $this->calculerValeurMensuelle();

        $statistiques = new Statistique([
            'nbrDocArchived' => $valeurMensuelle['nbrDocumentArchivé'],
            'nbrDocCreated' => $valeurMensuelle['nbrDocumentCréé'],
            'date' => now(),
        ]);

        $statistiques->save();
        $this->info('Statistiques mensuelles enregistrées avec succès.');
    }

    private function calculerValeurMensuelle() : array
    {
        $createdDocumentPerMonth = Document::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->get();
        $archivedDocumentsPerMonth = Document::whereYear('archived_at', Carbon::now()->year)->whereMonth('archived_at', Carbon::now()->month)->get();

        // Ici je dois retourner un tableau en clé => valeur dans lequel il y aura toutes mes données mensuelles
        // Pour l'instant il n'y a que le nombre de document archivé dans le mois.
        return [
            'nbrDocumentCréé' => count($createdDocumentPerMonth),
            'nbrDocumentArchivé' => count($archivedDocumentsPerMonth),
        ];
    }
}
