<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChemiseDossier;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ChemiseDossierFormRequest;

class ChemiseDossierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.chemise-dossier.chemises', [
            'chemises' => ChemiseDossier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.chemise-dossier.chemise-form', [
            'chemise' => new ChemiseDossier()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChemiseDossierFormRequest $request): RedirectResponse
    {
        ChemiseDossier::create($request->validated());
        return redirect()
            ->route('admin.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChemiseDossier $chemise): View
    {
        return view('admin.chemise-dossier.chemise-form', [
            'chemise' => $chemise
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChemiseDossierFormRequest $request, ChemiseDossier $chemise): RedirectResponse
    {
        $chemise->update($request->validated());
        return redirect()
            ->route('admin.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChemiseDossier $chemise): RedirectResponse
    {
        $chemise->delete();
        return redirect()
            ->route('admin.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été supprimée');
    }
}
