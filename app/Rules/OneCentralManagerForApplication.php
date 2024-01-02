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
        if (
            in_array(Role::findByName('Gestionnaire-Central')->id, request()->roles)
            && Role::all()->count() > 0
        )
        $fail('Il existe déjà un Gestionnaire Central à la DSI.');
    }
}
