<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Rules\CustomValidationRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'password' => $this->passwordRules(),
            'fonction_id' => ['integer','exists:fonctions,id', 'required'],
            'division_id' => ['integer','exists:divisions,id', 'required'],
            'service_id' => ['integer','exists:services,id', 'required'],
            'direction_id' => ['integer','exists:directions,id', 'required'],
            /* 'permissions' => ['array','exists:permissions,id', 'required'], */
            'roles' => ['array','exists:roles,id', 'required', new CustomValidationRule()]
        ])->validate();

        // dd($input);

        $user = User::create([
            'matricule' => $input['matricule'],
            'nom' => $input['nom'],
            'prenoms' => $input['prenoms'],
            'email' => $input['email'],
            'datenaissance' => $input['datenaissance'],
            'sexe' => $input['sexe'],
            'password' => Hash::make($input['password']),
            'fonction_id' => $input['fonction_id'],
            'division_id' => $input['division_id'],
            'service_id' => $input['service_id'],
            'direction_id' => $input['direction_id']
        ]);
        $user->roles()->sync($input['roles']);
        $user->permissions()->sync($input['permissions']);
        return $user;
    }
}
