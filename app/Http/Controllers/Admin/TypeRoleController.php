<?php

namespace App\Http\Controllers\Admin;

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
    public function index(): View
    {
        return view('admin.type-role.typeroles', [
            'typeroles' => TypeRole::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.type-role.typerole-form', [
            'typerole' => new TypeRole(),
            'permissions' => Permission::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRoleFormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        unset($data['permissions']);
        $typerole = TypeRole::create($data);
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
            'permissions' => Permission::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRoleFormRequest $request, TypeRole $typeRole): RedirectResponse
    {
        $data = $request->validated();
        unset($data['permissions']);
        $typeRole->update($data);
        $typeRole->severalpermissions()->update([
            'type_role_id' => null
        ]);
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
