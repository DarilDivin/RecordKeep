<?php

namespace App\Http\Controllers\Manager;

use App\Models\Categorie;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\CategorieFormRequest;

class CategorieController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Categorie::class, 'categorie');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('manager.categorie.categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('manager.categorie.categorie-form', [
            'categorie' => new Categorie()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieFormRequest $request): RedirectResponse
    {
        Categorie::create($request->validated());
        return redirect()
            ->route('manager.categorie.index')
            ->with('success', 'La Catégorie a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie): view
    {
        return view('manager.categorie.categorie-form', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieFormRequest $request,  Categorie $categorie): RedirectResponse
    {
        $categorie->update($request->validated());
        return redirect()
            ->route('manager.categorie.index')
            ->with('success', 'La Catégorie a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie): RedirectResponse
    {
        $categorie->delete();
        return redirect()
            ->route('manager.categorie.index')
            ->with('success', 'La Catégorie a bien été supprimée');
    }
}
