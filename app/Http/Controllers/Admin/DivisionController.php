<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DivisionFormRequest;
use App\Models\Division;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.division.divisions', [
            'divisions' => Division::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.division.division-form', [
            'division' => new Division(),
            'services' => Service::getAllServices(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisionFormRequest $request): RedirectResponse
    {
        Division::create($request->validated());
        return redirect()
            ->route('admin.division.index')
            ->with('success', 'Le service a bien été  créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division): View
    {
        return view('admin.division.division-form', [
            'division' => $division,
            'services' => Service::getAllServices(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisionFormRequest $request, Division $division): RedirectResponse
    {
        $division->update($request->validated());
        return redirect()
            ->route('admin.division.index')
            ->with('success', 'La division a bien été  modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division): RedirectResponse
    {
        $division->delete();
        return redirect()
            ->route('admin.division.index')
            ->with('success', 'La division a bien été supprimée');
    }
}
