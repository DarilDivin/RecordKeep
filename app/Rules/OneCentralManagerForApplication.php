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

        if ($routeName === 'admin.user.update') {
            $rolesNames = [];
            $userRoles = request()->route()->parameter('user')->roles->toArray();
            array_map(function ($role) use (&$rolesNames) {
                $rolesNames[] = $role['name'];
            }, $userRoles);
        }

        if (
            ($routeName === "user.register")
            && in_array(Role::findByName('Gestionnaire-Central')->id, request()->roles)
            && Role::where('name', '=', 'Gestionnaire-Central')->count() > 0
        )
        $fail('Il existe déjà un Gestionnaire Central pour le MISP à la DSI.');

        elseif (
            ($routeName === "admin.user.update" && !in_array('Gestionnaire-Central', $rolesNames))
            && in_array(Role::findByName('Gestionnaire-Central')->id, request()->roles)
            && Role::where('name', '=', 'Gestionnaire-Central')->count() > 0
        )
        $fail('Il existe déjà un Gestionnaire Central pour le MISP à la DSI.');

    }
}
