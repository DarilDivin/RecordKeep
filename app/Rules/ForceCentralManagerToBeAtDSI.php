<?php

namespace App\Rules;

use App\Models\Direction;
use Closure;
use App\Models\Role;
use Illuminate\Contracts\Validation\ValidationRule;

class ForceCentralManagerToBeAtDSI implements ValidationRule
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
            && Direction::find(request()->direction_id)->sigle !== "DSI"
        )
        $fail('Le Gestionnaire Central doit se trouver à la DSI.');

    }
}
