<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\PermissionFormRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permission.permissions',[
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.permission-form', [
            'permission' => new Permission(),
            'roles' => Role::all()->pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionFormRequest $request)
    {
        $data = $request->validated();
        unset($data['roles']);
        Permission::create($data)
            ->assignRole($request->roles);
        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'La Permission a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.permission-form', [
            'permission' => $permission,
            'roles' => Role::all()->pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionFormRequest $request, Permission $permission)
    {
        $data = $request->validated();
        unset($data['roles']);
        $permission->update($data);
        $permission->syncRoles($request->roles);
        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'La Permission a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'La Permission a bien été supprimée');
    }
}
