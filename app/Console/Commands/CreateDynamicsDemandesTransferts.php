<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Direction;
use App\Models\DemandeTransfert;
use Illuminate\Console\Command;

class CreateDynamicsDemandesTransferts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-dynamics-demandes-transferts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "
        Cette tâche se charge de créer automatiquement des
        Demandes de Transferts chaque mois pour chaque Direction
    ";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Direction::all() as $direction) {
            $demandesOfDirection = $direction->demandetransferts;
            foreach ($demandesOfDirection as $demande) {
                if ($demande->documents->count() > 0) {
                    $demande->update(['transferable' => 1]);
                }else {
                    $demande->update(['transferable' => 1]);
                    $demande->delete();
                }
            }
            DemandeTransfert::create([
                "libelle" =>
                    "Demande de Transfert de " .
                    ucfirst(Carbon::now()->translatedFormat('F')) . " " .
                    Carbon::now()->translatedFormat('Y') . " ",
                'direction_id' => $direction->id,
            ]);
        }
    }
}
