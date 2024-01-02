<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;

class DemandePretController extends Controller
{
    public function indexValidé()
    {
        $demandes = DemandePret::whereEtat('validé')->get();

        return view('manager.demande-pret.demandes-validés', [
            'demandes' => $demandes,
        ]);
    }

    public function index()
    {
        $demandes = DemandePret::all();

        // dd($demandes);

        return view('manager.demande-pret.demandes-encours', [
            'demandes' => $demandes,
        ]);
    }
}
