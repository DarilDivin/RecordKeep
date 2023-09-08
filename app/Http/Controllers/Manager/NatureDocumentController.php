<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\NatureDocumentFormRequest;
use App\Models\NatureDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NatureDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(NatureDocument::class, 'nature');
    }

    public function index(): View
    {
        return view('manager.nature-document.natures');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('manager.nature-document.nature-form', [
            'nature' => new NatureDocument()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NatureDocumentFormRequest $request): RedirectResponse
    {
        NatureDocument::create($request->validated());
        return redirect()
            ->route('manager.nature.index')
            ->with('success', 'La Nature de Document a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NatureDocument $nature)
    {
        return view('manager.nature-document.nature-form', [
            'nature' => $nature
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NatureDocumentFormRequest $request, NatureDocument $nature)
    {
        $nature->update($request->validated());
        return redirect()
            ->route('manager.nature.index')
            ->with('success', 'La Nature de Document a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NatureDocument $nature)
    {
        $nature->delete();
        return redirect()
            ->route('manager.nature.index')
            ->with('success', 'La Nature de Document a bien été supprimée');
    }
}
