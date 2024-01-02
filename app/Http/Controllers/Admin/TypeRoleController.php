<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\TypeRole;
use App\Models\Permission;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\TypeRoleFormRequest;

class TypeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(TypeRole::class);
    }

    public function index(): View
    {
        return view('admin.type-role.typeroles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.type-role.typerole-form', [
            'typerole' => new TypeRole(),
            'roles' => Role::all()->pluck('name', 'id'),
            'permissions' => Permission::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRoleFormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        unset($data['roles']);
        unset($data['permissions']);
        $typerole = TypeRole::create($data);
        foreach($request->roles as $roleId){
            $role = Role::find($roleId);
            $role->update([
                'type_role_id' => $typerole->id
            ]);
        }
        foreach($request->permissions as $permissionId){
            $permission = Permission::find($permissionId);
            $permission->update([
                'type_role_id' => $typerole->id
            ]);
        }
        return redirect()
            ->route('admin.type-role.index')
            ->with('success', 'Le Type de Rôle a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeRole $typeRole): View
    {
        return view('admin.type-role.typerole-form', [
            'typerole' => $typeRole,
            'roles' => Role::all()->pluck('name', 'id'),
            'permissions' => Permission::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRoleFormRequest $request, TypeRole $typeRole): RedirectResponse
    {
        $data = $request->validated();
        unset($data['roles']);
        unset($data['permissions']);
        $typeRole->update($data);
        $typeRole->severalRoles()->update([
            'type_role_id' => null
        ]);
        $typeRole->severalpermissions()->update([
            'type_role_id' => null
        ]);
        foreach($request->roles as $roleId){
            $role = Role::find($roleId);
            $role->update([
                'type_role_id' => $typeRole->id
            ]);
        }
        foreach($request->permissions as $permissionId){
            $permission = Permission::find($permissionId);
            $permission->update([
                'type_role_id' => $typeRole->id
            ]);
        }
        return redirect()
            ->route('admin.type-role.index')
            ->with('success', 'Le Type de Rôle a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeRole $typeRole): RedirectResponse
    {
        $typeRole->delete();
        return redirect()
            ->route('admin.type-role.index')
            ->with('success', 'Le Type de Rôle a bien été supprimé');
    }
}
