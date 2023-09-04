<?php

namespace App\Http\Controllers\Manager;

use App\Models\RayonRangement;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\RayonRangementFormRequest;

class RayonRangementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('manager.rayon-rangement.rayons');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('manager.rayon-rangement.rayon-form', [
            'rayon' => new RayonRangement()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RayonRangementFormRequest $request): RedirectResponse
    {
        $r = RayonRangement::create($request->validated());
        $r->update([
            'code' => 'R' . $r->id
        ]);
        return redirect()
            ->route('manager.rayon.index')
            ->with('success', 'Le Rayon de Rangement a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RayonRangement $rayon): View
    {
        return view('manager.rayon-rangement.rayon-form', [
            'rayon' => $rayon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RayonRangementFormRequest $request, RayonRangement $rayon): RedirectResponse
    {
        $rayon->update($request->validated());
        return redirect()
            ->route('manager.rayon.index')
            ->with('success', 'Le Rayon de Rangement a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RayonRangement $rayon): RedirectResponse
    {
        $rayon->delete();
        return redirect()
            ->route('manager.rayon.index')
            ->with('success', 'La Rayon de Rangement a bien été supprimée');
    }
}
