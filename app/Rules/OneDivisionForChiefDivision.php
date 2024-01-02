<?php

namespace App\Rules;

use Closure;
use App\Models\Division;
use App\Models\Fonction;
use Illuminate\Contracts\Validation\ValidationRule;

class OneDivisionForChiefDivision implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            Fonction::find(request()->fonction_id)->fonction === 'Chef Division' &&
            Division::find(request()->division_id)->division === 'Aucune'
        ) {
            $fail('Le Chef Division doit appartenir à une division.');
        }
    }
}
