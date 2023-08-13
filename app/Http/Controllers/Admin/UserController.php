<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Division;
use App\Models\Fonction;
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
            'fonctions' => Fonction::pluck('fonction', 'id'),
            'divisions' => Division::pluck('division', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'L\'utilisateur à bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('admin.user.user-form', [
            'user' => $user,
            'fonctions' => Fonction::pluck('fonction', 'id'),
            'divisions' => Division::pluck('division', 'id'),
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
