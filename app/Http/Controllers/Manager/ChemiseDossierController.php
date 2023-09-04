<?php

namespace App\Http\Controllers\Manager;

use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\ChemiseDossierFormRequest;

class ChemiseDossierController extends Controller
{
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
    public function create(): View
    {
        return view('manager.chemise-dossier.chemise-form', [
            'chemise' => new ChemiseDossier(),
            'boites' => BoiteArchive::getAllBoites()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChemiseDossierFormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $ch = ChemiseDossier::create($data);
        $ch->update([
            'code' => BoiteArchive::find($data['boite_archive_id'])->code . 'CH' . $ch->id
        ]);
        return redirect()
            ->route('manager.chemise.index')
            ->with('success', 'La Chemise de Dossier a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChemiseDossier $chemise): View
    {
        return view('manager.chemise-dossier.chemise-form', [
            'chemise' => $chemise,
            'boites' => BoiteArchive::getAllBoites()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChemiseDossierFormRequest $request, ChemiseDossier $chemise): RedirectResponse
    {
        $data = $request->validated();
        $chemise->update(array_merge(
            $data, [
                'code' => BoiteArchive::find($data['boite_archive_id'])->code . 'CH' . $chemise->id
            ]
        ));
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
