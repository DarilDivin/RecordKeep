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

        $ManagerStdCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Gestionnaire-Standard')->toArray()
        )->count();

        $ManagerCtlCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Gestionnaire-Central')->toArray()
        )->count();

        $UserCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Utilisateur')->toArray()
        )->count();

        $nombreUtilisateursAuthentifies = User::where('email_verified_at', '!=', null)->get()->toArray();

        $pourcentageUtilisateursAuthentifies = count($utilisateurs) > 0 ? (count($nombreUtilisateursAuthentifies) * 100) / count($utilisateurs) : 0;

        $documents = Document::all();
        $nbrDocument = count($documents);
        $pourcentageDocumentArchivé = $nbrDocument > 0 ? (count($documents->where('archive')) * 100) / $nbrDocument : 0;
        $pourcentageDocumentPreté = $nbrDocument > 0 ? (count($documents->where('prete')) * 100) / $nbrDocument : 0;
        $pourcentageDocumentDispo = $nbrDocument > 0 ? (count($documents->where('disponibilite')) * 100) / $nbrDocument : 0;
        $pourcentageDocumentTéléchargé = $nbrDocument > 0 ? (count($documents->where('nbrdownload', '>=', 1)) * 100) / $nbrDocument : 0;



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
                'managerStd' => $ManagerStdCount,
                'managerCtl' => $ManagerCtlCount,
                'user' => $UserCount,
            ]
        ]);
    }
}
