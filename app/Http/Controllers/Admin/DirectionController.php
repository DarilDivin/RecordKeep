<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DirectionFormRequest;
use App\Models\Direction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.direction.directions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.direction.direction-form', [
            'direction' => new Direction
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DirectionFormRequest $request): RedirectResponse
    {
        Direction::create($request->validated());
        return redirect()
            ->route('admin.direction.index')
            ->with('success', 'La direction a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direction $direction): View
    {
        return view('admin.direction.direction-form', [
            'direction' => $direction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DirectionFormRequest $request, Direction $direction): RedirectResponse
    {
        $direction->update($request->validated());
        return redirect()
            ->route('admin.direction.index')
            ->with('success', 'La direction a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direction $direction): RedirectResponse
    {
        $direction->delete();
        return redirect()
            ->route('admin.direction.index')
            ->with('success', 'La direction a bien été supprimée');
    }
}
