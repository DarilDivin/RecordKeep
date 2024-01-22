<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use App\Models\Direction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\DivisionFormRequest;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(Division::class, 'division');
    }

    public function index(): View
    {
        return view('admin.division.divisions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $directions = Direction::has('services', '>=', 2)->orderBy('direction', 'ASC')->get();

        if ($directions->isEmpty()) {
            return redirect()
            ->route('manager.division.index')
            ->with('error', 'Veuillez disposer d\'une Direction contenant au moins un service d\'abord.');
        }

        return view('admin.division.division-form', [
            'division' => new Division(),
            'services' => $directions->first()->services->where('service', '!=', 'Aucun')->sortBy('service'),
            'directions' => $directions
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
        $directions = Direction::has('services', '>=', 2)->orderBy('direction', 'ASC')->get();
        return view('admin.division.division-form', [
            'division' => $division,
            'services' => $division->service->direction->services->where('service', '!=', 'Aucun')->sortBy('service'),
            'directions' => $directions
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
