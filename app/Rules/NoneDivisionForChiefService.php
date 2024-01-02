<?php

namespace App\Rules;

use Closure;
use App\Models\Division;
use App\Models\Fonction;
use Illuminate\Contracts\Validation\ValidationRule;

class NoneDivisionForChiefService implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            Fonction::find(request()->fonction_id)->fonction === 'Chef Service' &&
            Division::find(request()->division_id)->division !== 'Aucune'
        ) {
            $fail('Le Chef Service n\'appartient à aucune division.');
        }
    }
}
