<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fonction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\FonctionFormRequest;
use Illuminate\Support\Facades\Auth;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(Fonction::class, 'fonction');
    }

    public function index(): View | RedirectResponse
    {
        if(Auth::user()->can('Gestion des Fonctions')){
            return view('admin.fonction.fonctions');
        }else{
            return to_route('admin.statistique');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        if(Auth::user()->can('Gestion des Fonctions')){
            return view('admin.fonction.fonction-form', [
                'fonction' => new Fonction()
            ]);
        }else{
            return to_route('admin.statistique');
        }
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
