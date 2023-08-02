<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fonction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\FonctionFormRequest;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.fonction.fonctions', [
            'fonctions' => Fonction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fonction = new Fonction();
        return view('admin.fonction.fonction-form', [
            'fonction' => $fonction
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FonctionFormRequest $request): RedirectResponse
    {
        $fonction = $request->validated();
        Fonction::create($fonction);
        return redirect()
            ->route('admin.fonction.index')
            ->with('success', 'La fonction a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fonction $fonction): View
    {
        return view('admin.fonction.fonction-form', [
            'fonction' => $fonction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FonctionFormRequest $request, Fonction $fonction): RedirectResponse
    {
        $fonction->update($request->validated());
        return redirect()
            ->route('admin.fonction.index')
            ->with('success', 'La fonction a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fonction $fonction): RedirectResponse
    {
        $fonction->delete();
        return redirect()
            ->route('admin.fonction.index')
            ->with('success', 'La fonction a bien été supprimée');
    }
}
