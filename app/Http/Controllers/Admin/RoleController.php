<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\TypeRole;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleFormRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    public function index()
    {
        return view('admin.role.roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $firstTypeRole = TypeRole::orderBy('id', 'asc')->take(1)->get()->toArray();
        $firstTypeRoleId = $firstTypeRole[0]['id'];
        return view('admin.role.role-form', [
            'role' => new Role(),
            'typeroles' => TypeRole::all()->pluck('libelle', 'id'),
            'permissions' => Permission::where('type_role_id', $firstTypeRoleId)->get()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleFormRequest $request)
    {
        $data = $request->validated();
        unset($data['permissions']);
        Role::create($data)
            ->givePermissionTo($request->permissions);
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Le Rôle a bien été crée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.role-form', [
            'role' => $role,
            'typeroles' => TypeRole::all()->pluck('libelle', 'id'),
            'permissions' => $role->typerole->severalPermissions->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleFormRequest $request, Role $role)
    {
        $data = $request->validated();
        unset($data['permissions']);
        $role->update($data);
        $role->syncPermissions($request->permissions);
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Le Rôle a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Le Rôle a bien été supprimé');
    }
}
