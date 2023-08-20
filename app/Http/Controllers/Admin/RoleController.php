<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleFormRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role.roles',[
            // 'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.role-form', [
            'role' => new Role(),
            'permissions' => Permission::all()->pluck('name', 'id')->toArray()
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
            ->with('success', 'Le Role a bien été crée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        /* $ids = [];
        foreach($role->permissions->toArray() as $p){
            $ids[] = $p['id'];
        }
        dd($ids); */
        return view('admin.role.role-form', [
            'role' => $role,
            'permissions' => Permission::all()->pluck('name', 'id')->toArray()
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
            ->with('success', 'Le Role a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Le Role a bien été supprimé');
    }
}
