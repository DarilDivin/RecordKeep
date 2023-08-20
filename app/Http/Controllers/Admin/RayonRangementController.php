<?php

namespace App\Http\Controllers\Admin;

use App\Models\RayonRangement;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\RayonRangementFormRequest;

class RayonRangementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.rayon-rangement.rayons', [
            'rayons' => RayonRangement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.rayon-rangement.rayon-form', [
            'rayon' => new RayonRangement()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RayonRangementFormRequest $request): RedirectResponse
    {
        $lastRayonId = RayonRangement::latest()->take(1)->get()->toArray();
        RayonRangement::create(array_merge($request->validated(), [
            'code' => 'R' . $lastRayonId[0]['id'] + 1
        ]));
        return redirect()
            ->route('admin.rayon.index')
            ->with('success', 'Le Rayon de Rangement a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RayonRangement $rayon): View
    {
        return view('admin.rayon-rangement.rayon-form', [
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
            ->route('admin.rayon.index')
            ->with('success', 'Le Rayon de Rangement a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RayonRangement $rayon): RedirectResponse
    {
        $rayon->delete();
        return redirect()
            ->route('admin.rayon.index')
            ->with('success', 'La Rayon de Rangement a bien été supprimée');
    }
}