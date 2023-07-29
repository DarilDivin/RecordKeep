<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FonctionFormRequest;
use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fonction.fonctions', [
            'fonctions' => Fonction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fonction = new Fonction();
        return view('admin.fonction.fonction-form', [
            'fonction' => $fonction
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FonctionFormRequest $request)
    {
        $fonction = $request->validated();
        Fonction::create($fonction);
        return redirect()
            ->route('admin.fonction.index')
            ->with('success', 'La fonction a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fonction $fonction)
    {
        return view('admin.fonction.fonction-form', [
            'fonction' => $fonction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FonctionFormRequest $request, Fonction $fonction)
    {
        $fonction->update($request->validated());
        return redirect()
            ->route('admin.fonction.index')
            ->with('success', 'La fonction a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fonction $fonction)
    {
        $fonction->delete();
        return redirect()
            ->route('admin.fonction.index')
            ->with('success', 'La fonction a bien été supprimée');
    }
}
