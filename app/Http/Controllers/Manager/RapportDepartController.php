<?php

namespace App\Http\Controllers\Manager;

use Carbon\Carbon;
use App\Models\DemandePret;
use App\Models\RapportPret;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\RapportPretFormRequest;

class RapportDepartController extends Controller
{
    public function index() : View
    {
        return view('manager.rapports.rapport-prets', [
            'rapports' => RapportPret::where('type', '=', 'Départ')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create(DemandePret $demande) : View
    {
        return view('manager.rapports.depart-de-pret', [
            'demande' => $demande
        ]);
    }

    public function store(RapportPretFormRequest $request, DemandePret $demande) : RedirectResponse
    {
        $rapport = RapportPret::create(array_merge($request->validated(), [
            'type' => 'Départ',
            'demande_pret_id' => $demande->id
        ]));
        $rapport->demandePret()->update([
            'etat' => 'Terminé',
            'date_acceptation' => Carbon::now()->date()
        ]);
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
