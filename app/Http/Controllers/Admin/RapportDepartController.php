<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use App\Models\DemandePret;
use App\Models\RapportPret;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RapportPretFormRequest;

class RapportDepartController extends Controller
{
    public function index() : View
    {
        return view('admin.rapports.depart-de-pret');
    }

    public function create(DemandePret $demande)
    {
        return view('admin.rapports.depart-de-pret', [
            'demande' => $demande
        ]);
    }

    public function store(RapportPretFormRequest $request)
    {
        $rapport = RapportPret::create(array_merge($request->validated(), [
            'type' => 'Depart'
        ]));

        return redirect(route('rapport-show', ['rapport' => $rapport->id]));
    }

    public function show(RapportPret $rapport)
    {
        return view('admin.rapports.rapport-preview', [
            'rapport' => $rapport
        ]);
    }

    public function pdf(RapportPret $rapport)
    {

        $pdf = Pdf::loadView('admin.rapports.rapport-preview', ['rapport' => $rapport]);
        return $pdf->stream();
    }
}
