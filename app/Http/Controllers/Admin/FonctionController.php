<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fonction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\FonctionFormRequest;

class FonctionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Fonction::class, 'fonction');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View | RedirectResponse
    {
        return view('admin.fonction.fonctions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.fonction.fonction-form', [
            'fonction' => new Fonction()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FonctionFormRequest $request): RedirectResponse
    {
        Fonction::create($request->validated());
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
            ->with('success', 'La fonction a bien été modifiée');
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
