<?php

namespace App\Rules;

use App\Models\Direction;
use Closure;
use App\Models\Role;
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

        /*if () {

        }

        $standardManagerForDirectionChoice =
        Direction::find(request()->direction_id)
        ->whereHas('users', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'Gestionnaire-Standard');
            });
        })
        ->get();

        if ()
        $fail("Il existe déjà un Gestionnaire Standard à la .");*/
    }
}
