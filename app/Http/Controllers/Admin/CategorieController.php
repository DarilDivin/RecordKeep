<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategorieFormRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categorie.categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categorie.categorie-form', [
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
            ->route('admin.categorie.index')
            ->with('success', 'La Catégorie a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie): view
    {
        return view('admin.categorie.categorie-form', [
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
            ->route('admin.categorie.index')
            ->with('success', 'La Catégorie a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie): RedirectResponse
    {
        $categorie->delete();
        return redirect()
            ->route('admin.categorie.index')
            ->with('success', 'La Catégorie a bien été supprimée');
    }
}
