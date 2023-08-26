<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'matricule' => ['required','integer', 'min:6', Rule::unique('users')],
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string'],
            'email' => [

                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'datenaissance' => ['required', 'date'],
            'sexe' => ['required', 'string'],
            'role_id' => ['integer','exists:roles,id', 'required'],

            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'matricule' => $input['matricule'],
            'nom' => $input['nom'],
            'prenoms' => $input['prenoms'],
            'email' => $input['email'],
            'datenaissance' => $input['datenaissance'],
            'sexe' => $input['sexe'],
            'role_id' => $input['role_id'],
            'password' => Hash::make($input['password']),
            'fonction_id' => $input['fonction_id'],
            'division_id' => $input['division_id']
        ]);
        $user->roles->sync($input['roles']);
        return $user;
    }
}
