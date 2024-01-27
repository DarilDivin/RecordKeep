<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;
use App\Models\RapportPret;

class DemandePretController extends Controller
{
    public function indexValidé()
    {
        return view('manager.demande-pret.demandes-validés', [
            'demandes' => DemandePret::whereEtat('validé')->get(),
        ]);
    }

    public function index()
    {
        dd(RapportPret::find(10)->demandePret->document->prete);
        return view('manager.demande-pret.demandes-encours', [
            'demandes' => DemandePret::all(),
        ]);
    }
}
