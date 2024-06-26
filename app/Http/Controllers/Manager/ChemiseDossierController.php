<?php

namespace App\Http\Controllers\Manager;

use App\Models\ChemiseDossier;
use App\Models\RayonRangement;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\ChemiseDossierFormRequest;

class ChemiseDossierController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(ChemiseDossier::class, 'chemise');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('manager.chemise-dossier.chemises');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        $rayons = RayonRangement::has('boitearchives', '>=', 1)->orderBy('libelle', 'ASC')->get();

        if ($rayons->isEmpty()) {
            return redirect()
            ->route('manager.chemise.index')
            ->with('error', 'Veuillez disposer d\'un Rayon contenant au moins une boîte d\'abord.');
        }

        return view('manager.chemise-dossier.chemise-form', [
            'chemise' => new ChemiseDossier(),
            'boites' => $rayons->first()->boitearchives->sortBy('libelle'),
            'rayons' => $rayons
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChemiseDossierFormRequest $request): RedirectResponse
    {
        ChemiseDossier::create($request->validated());
        return redirect()
            ->route('manager.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChemiseDossier $chemise): View
    {
        $rayons = RayonRangement::has('boitearchives', '>=', 1)->orderBy('libelle', 'ASC')->get();
        return view('manager.chemise-dossier.chemise-form', [
            'chemise' => $chemise,
            'boites' => $chemise->boitearchive->rayonrangement->boitearchives->sortBy('service'),
            'rayons' => $rayons
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChemiseDossierFormRequest $request, ChemiseDossier $chemise): RedirectResponse
    {
        $chemise->update($request->validated());
        return redirect()
            ->route('manager.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChemiseDossier $chemise): RedirectResponse
    {
        $chemise->delete();
        return redirect()
            ->route('manager.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été supprimée');
    }
}
