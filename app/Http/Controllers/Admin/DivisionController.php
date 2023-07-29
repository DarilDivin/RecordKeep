<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DivisionFormRequest;
use App\Models\Division;
use App\Models\Service;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.division.divisions', [
            'divisions' => Division::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $division = new Division();

        return view('admin.division.division-form', [
            'division' => $division,
            'services' => Service::pluck('service', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisionFormRequest $request)
    {
        $division = Division::create($request->validated());
        // $service->direction()->sync($request->validated('direction'));
        return redirect()
            ->route('admin.division.index')
            ->with('success', 'Le service a bien été  créé');
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
    public function edit(Division $division)
    {
        return view('admin.division.division-form', [
            'division' => $division,
            'services' => Service::pluck('service', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisionFormRequest $request, Division $division)
    {
        $division->update($request->validated());
        // $service->direction()->sync($request->validated('direction'));
        return redirect()
            ->route('admin.division.index')
            ->with('success', 'La division a bien été  modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()
            ->route('admin.division.index')
            ->with('success', 'La division a bien été supprimé');
    }
}
