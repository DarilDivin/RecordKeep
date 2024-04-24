<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use App\Models\Service;
use App\Models\Division;
use App\Rules\ForceCentralManagerToBeAtDSI;
use App\Rules\SameTypeRoleRule;
use App\Rules\UserBirthDayRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Rules\NoneServiceForDirector;
use Illuminate\Support\Facades\Validator;
use App\Rules\NoneDivisionForChiefService;
use App\Rules\NoneDivisionForDirector;
use App\Rules\OneCentralManagerForApplication;
use App\Rules\OneChiefServiceForOneService;
use App\Rules\OneDirectorForOneDirection;
use App\Rules\OneDivisionForChiefDivision;
use App\Rules\OneServiceForChiefDivision;
use App\Rules\OneServiceForChiefService;
use App\Rules\OneStandardManagerForDirection;
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
            'matricule' => [
                /* 'required', */'integer', 'min:6',
                Rule::unique('users')
                ->withoutTrashed()
            ],
            'nom' => [/* 'required', */ 'string', 'max:255'],
            'prenoms' => [/* 'required', */ 'string'],
            'email' => [
                /* 'required', */'string',
                'email','max:255',
                Rule::unique(User::class)
                ->withoutTrashed()
            ],
            'datenaissance' => [/* 'required', */ 'date', new UserBirthDayRule()],
            'sexe' => [/* 'required', */ 'string'],
            'password' => $this->passwordRules(),
            'fonction_id' => ['integer','exists:fonctions,id', /* 'required', */
                new OneDirectorForOneDirection(), new OneChiefServiceForOneService()
            ],
            'division_id' => [
                'integer','exists:divisions,id', /* 'required', */
                new NoneDivisionForDirector(),new NoneDivisionForChiefService(),
                new OneDivisionForChiefDivision()
            ],
            'service_id' => [
                'integer','exists:services,id', /* 'required', */
                new NoneServiceForDirector(), new OneServiceForChiefService(),
                new OneServiceForChiefDivision()
            ],
            'direction_id' => ['integer','exists:directions,id', 'required'],
            'roles' => ['array','exists:roles,id', /* 'required', */
                new SameTypeRoleRule(), new ForceCentralManagerToBeAtDSI(),
                new OneStandardManagerForDirection(),
                new OneCentralManagerForApplication()
            ]
        ])->validate();

        /*
            if(Service::find($input['service_id'])->service === 'Aucun') {
                $input['service_id'] = null;
            }
            if(Division::find($input['division_id'])->division === 'Aucune') {
                $input['division_id'] = null;
            }
        */

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
        foreach ($input['roles'] as $role) {
            foreach (Role::find($role)->permissions as $permission) {
                $user->givePermissionTo($permission->name);
            }
        }
        /* foreach($input['roles'] as $role){
            $user->permissions()->sync(Role::find($role)->permissions);
        } */
        /* array_map(function ($role) use($user) {
            $user->permissions()->sync(Role::find($role)->permissions);
        }, $input['roles']); */
        return $user;
    }
}
