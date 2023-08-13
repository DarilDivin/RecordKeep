<?php

namespace App\Http\Controllers\Admin;

use App\Models\BoiteArchive;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\BoiteArchiveFormRequest;

class BoiteArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.boite-archive.boites', [
            'boites' => BoiteArchive::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.boite-archive.boite-form', [
            'boite' => new BoiteArchive()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoiteArchiveFormRequest $request): RedirectResponse
    {
        BoiteArchive::create($request->validated());
        return redirect()
            ->route('admin.boite.index')
            ->with('success', 'La Boîte Archive a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoiteArchive $boite): View
    {
        return view('admin.boite-archive.boite-form', [
            'boite' => $boite
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoiteArchiveFormRequest $request, BoiteArchive $boite): RedirectResponse
    {
        $boite->update($request->validated());
        return redirect()
            ->route('admin.boite.index')
            ->with('success', 'La Boîte Archive a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoiteArchive $boite): RedirectResponse
    {
        $boite->delete();
        return redirect()
            ->route('admin.boite.index')
            ->with('success', 'La Boîte Archive a bien été supprimée');
    }
}
