<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;

class DemandePretController extends Controller
{
    public function index()
    {
        return view('manager.demande-pret.demandes-encours', [
            'demandes' => DemandePret::all(),
        ]);
    }
}
