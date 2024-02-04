<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\RapportPretFormRequest;
use App\Models\Document;
use App\Models\RapportPret;

class RapportRetourController extends Controller
{
    public function create(RapportPret $rapportDepart)
    {
        return view('manager.rapports.retour-de-pret', [
            'rapportDepart' => $rapportDepart,
        ]);
    }

    public function store(RapportPretFormRequest $request)
    {
        $rapport = RapportPret::create(array_merge($request->validated(), [
            'type' => 'Retour'
        ]));
        Document::find($rapport->demandePret->document->id)->update([
            'prete' => 0,
            'disponibilite' => 1
        ]);
        return to_route('rapport-depart-list')->with('success', 'Votre rapport à été bien crée.  <a target="_blank" href="' . route('rapport-show', ['rapport' => $rapport->id]) . '"> Cliquez ici pour y accéder </a>');
    }

    public function show(RapportPret $rapport)
    {
        return view('manager.rapports.rapport-preview', [
            'rapport' =>$rapport
        ]);
    }
}
