<?php

namespace App\Http\Controllers\Manager;

use App\Models\BoiteArchive;
use App\Models\RayonRangement;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\BoiteArchiveFormRequest;

class BoiteArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('manager.boite-archive.boites');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('manager.boite-archive.boite-form', [
            'boite' => new BoiteArchive(),
            'rayons' => RayonRangement::getAllRayons()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoiteArchiveFormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $b = BoiteArchive::create($data);
        $b->update([
            'code' => RayonRangement::find($data['rayon_rangement_id'])->code . 'B' . $b->id
        ]);
        return redirect()
            ->route('manager.boite.index')
            ->with('success', 'La Boîte Archive a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoiteArchive $boite): View
    {
        return view('manager.boite-archive.boite-form', [
            'boite' => $boite,
            'rayons' => RayonRangement::getAllRayons()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoiteArchiveFormRequest $request, BoiteArchive $boite): RedirectResponse
    {
        $data = $request->validated();
        $boite->update(array_merge(
            $data, [
                'code' => RayonRangement::find($data['rayon_rangement_id'])->code . 'B' . $boite->id
            ]
        ));

        return redirect()
            ->route('manager.boite.index')
            ->with('success', 'La Boîte Archive a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoiteArchive $boite): RedirectResponse
    {
        $boite->delete();
        return redirect()
            ->route('manager.boite.index')
            ->with('success', 'La Boîte Archive a bien été supprimée');
    }
}
