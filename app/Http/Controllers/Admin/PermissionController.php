<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\TypeRole;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'permission');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.permission.permissions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permission = new Permission();
        return view('admin.permission.permission-form', [
            'permission' => $permission,
            'typeroles' => TypeRole::all()->pluck('libelle', 'id'),
            'roles' => Role::where('type_role_id', TypeRole::first()->id)->get()->toArray(),
            'permissionRoles' => $permission->roles->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionFormRequest $request): RedirectResponse
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
    public function edit(Permission $permission): View
    {
        return view('admin.permission.permission-form', [
            'permission' => $permission,
            'typeroles' => TypeRole::all()->pluck('libelle', 'id'),
            'roles' => $permission->typerole->severalRoles->toArray(),
            'permissionRoles' => $permission->roles->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionFormRequest $request, Permission $permission): RedirectResponse
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
    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'La Permission a bien été supprimée');
    }
}
