<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DirectionFormRequest;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.direction.directions', [
            'directions' => Direction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $direction = new Direction;
        return view('admin.direction.direction-form', [
            'direction' => $direction
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DirectionFormRequest $request)
    {
        $direction = $request->validated();
        Direction::create($direction);
        return redirect()
            ->route('admin.direction.index')
            ->with('success', 'La direction a bien été créé');
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
    public function edit(Direction $direction)
    {
        return view('admin.direction.direction-form', [
            'direction' => $direction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DirectionFormRequest $request, Direction $direction)
    {
        $direction->update($request->validated());
        return redirect()
            ->route('admin.direction.index')
            ->with('success', 'La direction a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        return redirect()
            ->route('admin.direction.index')
            ->with('success', 'La direction a bien été supprimée');
    }
}
