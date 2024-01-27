<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\RapportPretFormRequest;
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
        $rapport->demandePret()->document()->update([
            'prete' => 0,
            'disponibilite' => 1
        ]);
        $rapport->demandePret->document->prete = 0;
        $rapport->demandePret->document->disponibilite = 1;
        return redirect(route('rapport-show', ['rapport' => $rapport->id]));
    }

    public function show(RapportPret $rapport)
    {
        return view('manager.rapports.rapport-preview', [
            'rapport' =>$rapport
        ]);
    }
}
