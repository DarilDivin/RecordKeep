<?php

namespace App\Rules;

use App\Models\Role;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OneCentralManagerForApplication implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $routeName = request()->route()->getName();

        $rolesNames = [];
        $userRoles = request()->route()->parameter('user')->roles->toArray();
        array_map(function ($role) use (&$rolesNames) {
            $rolesNames[] = $role['name'];
        }, $userRoles);

        if (($routeName === "admin.user.store" || ($routeName === "admin.user.edit" && !in_array('Gestionnaire-Central', $rolesNames)))
            && in_array(Role::findByName('Gestionnaire-Central')->id, request()->roles)
            && Role::findByName('Gestionnaire-Central')->count() > 0
        )
        $fail('Il existe déjà un Gestionnaire Central à la DSI.');

    }
}
