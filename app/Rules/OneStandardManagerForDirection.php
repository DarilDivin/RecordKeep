<?php

namespace App\Rules;

use Closure;
use App\Models\Role;
use App\Models\User;
use App\Models\Direction;
use Illuminate\Contracts\Validation\ValidationRule;

class OneStandardManagerForDirection implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $routeName = request()->route()->getName();

        if ($routeName === 'admin.user.update') {
            $rolesNames = [];
            $userRoles = request()->route()->parameter('user')->roles->toArray();
            array_map(function ($role) use (&$rolesNames) {
                $rolesNames[] = $role['name'];
            }, $userRoles);
        }

        $standardManagerForDirectionChoice =
        /* Direction::find(request()->direction_id)
        ->whereHas('users', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'Gestionnaire-Standard');
            });
        })
        ->get(); */
        User::where('direction_id', request()->direction_id)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'Gestionnaire-Standard');
        })
        ->count();

        if (
            ($routeName === 'user.register')
            && in_array(Role::findByName('Gestionnaire-Standard')->id, request()->roles)
            && $standardManagerForDirectionChoice > 0
        )
        $fail("Il existe déjà un Gestionnaire Standard à la " . Direction::find(request()->direction_id)->sigle);

        elseif (
            (($routeName === 'admin.user.update') && !in_array('Gestionnaire-Standard', $rolesNames))
            && in_array(Role::findByName('Gestionnaire-Standard')->id, request()->roles)
            && $standardManagerForDirectionChoice > 0
        )
        $fail("Il existe déjà un Gestionnaire Standard à la " . Direction::find(request()->direction_id)->sigle);

    }
}
