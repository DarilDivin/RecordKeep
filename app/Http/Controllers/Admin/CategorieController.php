<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieFormRequest;
use App\Models\Categorie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieFormRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie): view
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieFormRequest $request,  Categorie $categorie): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie): RedirectResponse
    {
        //
    }
}
