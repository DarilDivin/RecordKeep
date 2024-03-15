<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\TypeRole;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    public function index(): View
    {
        return view('admin.role.roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $role = new Role();
        return view('admin.role.role-form', [
            'role' => $role,
            'typeroles' => TypeRole::all()->pluck('libelle', 'id'),
            'permissions' => Permission::where('type_role_id', TypeRole::first()->id)->get()->toArray(),
            'rolePermissions' => $role->permissions->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleFormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        unset($data['permissions']);
        dd($request);
        Role::create($data)
            ->givePermissionTo($request->permissions);
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Le Rôle a bien été crée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View | RedirectResponse
    {
        return view('admin.role.role-form', [
            'role' => $role,
            'typeroles' => TypeRole::all()->pluck('libelle', 'id'),
            'permissions' => $role->typerole->severalPermissions->toArray(),
            'rolePermissions' => $role->permissions->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleFormRequest $request, Role $role): RedirectResponse
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
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Le Rôle a bien été supprimé');
    }
}
