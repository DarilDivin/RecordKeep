<?php

namespace App\Http\Controllers\Manager;

use App\Models\Document;
use App\Models\DemandePret;
use App\Models\RapportPret;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\RapportPretFormRequest;

class RapportDepartController extends Controller
{
    public function index() : View
    {
        return view('manager.rapports.rapport-prets', [
            'rapports' => RapportPret::where('type', '=', 'depart')->get(),
        ]);
    }

    public function create(DemandePret $demande)
    {
        return view('manager.rapports.depart-de-pret', [
            'demande' => $demande
        ]);
    }

    public function store(RapportPretFormRequest $request)
    {
        $rapport = RapportPret::create(array_merge($request->validated(), [
            'type' => 'Départ'
        ]));
        return to_route('demande-de-prets')->with('success', 'Votre rapport à été bien crée.  <a target="_blank" href="' . route('rapport-show', ['rapport' => $rapport->id]) . '"> Cliquez ici pour y accéder </a>');
    }

    public function show(RapportPret $rapport)
    {
        return view('manager.rapports.rapport-preview', [
            'rapport' => $rapport
        ]);
    }

    public function pdf(RapportPret $rapport)
    {
        $pdf = Pdf::loadView('manager.rapports.rapport-preview', ['rapport' => $rapport]);

        $pdf->setOption([
            'dpi' => 150,
            'defaultFont' => 'Poppins',
        ]);

        return $pdf->stream();
    }
}
