<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Service;
use App\Models\Division;
use App\Models\Fonction;
use App\Models\Direction;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\UserFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.user.users',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user =  new User();
        $user->fill([
            'matricule' => '121315',
            'nom' => 'CODJO',
            'prenoms' => 'Gérard',
            'email' => 'gerard@codjo.com',
        ]);
        return view('admin.user.user-form', [
            'user' => $user,
            'services' => Service::getAllServices(),
            'fonctions' => Fonction::getAllFonctions(),
            'divisions' => Division::getAllDivisions(),
            'roles' => Role::all()->pluck('name', 'id'),
            'directions' => Direction::getAllDirections(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(UserFormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $fusion = [];
        array_reduce($fusion, function ($carry, $item) {
            if($carry === null){
                return $item;
            }
            return array_merge($carry, $item);
        });
        unset($data['fusion']);
        $user = User::create($data);
        $user->roles()->sync($request->roles);
        $user->permissions()->sync($request->permissions);
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'L\'utilisateur à bien été créé');
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('admin.user.user-form', [
            'user' => $user,
            'services' => Service::getAllServices(),
            'fonctions' => Fonction::getAllFonctions(),
            'divisions' => Division::getAllDivisions(),
            'roles' => Role::all()->pluck('name', 'id'),
            'directions' => Direction::getAllDirections(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'L\' utilisateur a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'L\'utilisateur a bien été supprimé');
    }
}
