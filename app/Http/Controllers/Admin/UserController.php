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
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\UserFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(): View
    {
        return view('admin.user.users');
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
            'userPermissions' => $user->permissions->toArray(),
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
            'userPermissions' => $user->permissions->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'matricule' => $request['matricule'],
            'nom' => $request['nom'],
            'prenoms' => $request['prenoms'],
            'email' => $request['email'],
            'datenaissance' => $request['datenaissance'],
            'sexe' => $request['sexe'],
            'password' => Hash::make($request['password']),
            'fonction_id' => $request['fonction_id'],
            'division_id' => $request['division_id'],
            'service_id' => $request['service_id'],
            'direction_id' => $request['direction_id']
        ]);
        if(Service::find($request['service_id'])->service === 'Aucun') {
            $request['service_id'] = null;
        }
        if(Division::find($request['division_id'])->division === 'Aucune') {
            $request['division_id'] = null;
        }
        $user->roles()->sync($request['roles']);
        foreach($request['roles'] as $role){
            $user->permissions()->sync(Role::find($role)->permissions);
        }
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
