<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;
use Illuminate\Http\Request;

class DemandePretController extends Controller
{
    public function indexValidé()
    {
        $demandes = DemandePret::whereEtat('validé')->get();

        return view('admin.demande-pret.demandes-validés', [
            'demandes' => $demandes,
        ]);
    }

    public function indexEncours()
    {
        $demandes = DemandePret::where('etat', '=', 'encour')->get();

        return view('admin.demande-pret.demandes-encours', [
            'demandes' => $demandes,
        ]);
    }
}
