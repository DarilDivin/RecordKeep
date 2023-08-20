<?php

namespace App\Http\Controllers\Admin;


use App\Models\Permission;
use App\Models\SousPermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SousPermissionFormRequest;

class SousPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sous-permission.permissions',[
            'permissions' => SousPermission::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sous-permission.permission-form', [
            'permission' => new SousPermission(),
            'permissions' => Permission::all()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SousPermissionFormRequest $request)
    {
        SousPermission::create($request->validated());
        return redirect()
            ->route('admin.sous-permission.index')
            ->with('success', 'La Sous Permission a bien été  créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SousPermission $sousPermission)
    {
        return view('admin.sous-permission.permission-form', [
            'permission' => $sousPermission,
            'permissions' => Permission::all()->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SousPermissionFormRequest $request, SousPermission $sousPermission)
    {
        $sousPermission->update($request->validated());
        return redirect()
            ->route('admin.sous-permission.index')
            ->with('success', 'La Sous Permission a bien été  modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SousPermission $sousPermission)
    {
        $sousPermission->delete();
        return redirect()
            ->route('admin.sous-permission.index')
            ->with('success', 'La Sous Permission a bien été  supprimé');
    }
}
