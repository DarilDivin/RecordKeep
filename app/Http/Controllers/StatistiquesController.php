<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Document;
use App\Models\Statistique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatistiquesController extends Controller
{
    public function stat()
    {
        $utilisateurs = User::with('roles')->get()->toArray();

        $AdminCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Administrateur')->toArray()
        )->count();

        $ManagerCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Gestionnaire')->toArray()
        )->count();

        $UserCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Utilisateur')->toArray()
        )->count();

        $nombreUtilisateursAuthentifies = 0;

        foreach ($utilisateurs as $utilisateur) {
            if (Auth::check()) {
                $nombreUtilisateursAuthentifies++;
            }
        }

        $pourcentageUtilisateursAuthentifies = ($nombreUtilisateursAuthentifies * 100) / count($utilisateurs);

        $documents = Document::all();
        $nbrDocument = count($documents);
        $pourcentageDocumentArchivé = (count($documents->where('archive')) * 100) / $nbrDocument;
        $pourcentageDocumentPreté = (count($documents->where('prete')) * 100) / $nbrDocument;
        $pourcentageDocumentDispo = (count($documents->where('disponibilite')) * 100) / $nbrDocument;
        $pourcentageDocumentTéléchargé = (count($documents->where('nbrdownload', '>=', 1)) * 100) / $nbrDocument;



        $data = Statistique::orderBy('id', 'desc')->limit(12)->get()    ;

        $data = $data->reverse();

        $formattedData = [];
        foreach ($data as $entry) {
            $formattedData[] = [
                'date' => $entry->date,
                'nbrDocArchived' => $entry->nbrDocArchived,
                'nbrDocCreated' => $entry->nbrDocCreated,
            ];
        }





        return view('admin.Dashboard-Statistiques', [
            'nbrdocument' => $nbrDocument,
            'nbruser' => count($utilisateurs),
            'pourcentagedocumentArchivé' => $pourcentageDocumentArchivé,
            'pourcentagedocumentPreté' => $pourcentageDocumentPreté,
            'pourcentagedocumentDispo' => $pourcentageDocumentDispo,
            'pourcentagedocumentTéléchargé' => $pourcentageDocumentTéléchargé,
            'pourcentageUtilisateursAuthentifies' => $pourcentageUtilisateursAuthentifies,
            'formattedData' => $formattedData,
            'UserDonut' => [
                'admin' => $AdminCount,
                'manager' => $ManagerCount,
                'user' => $UserCount,
            ]
        ]);
    }
}
