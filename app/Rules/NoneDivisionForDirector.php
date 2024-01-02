<?php

namespace App\Rules;

use App\Models\Division;
use Closure;
use App\Models\Fonction;
use Illuminate\Contracts\Validation\ValidationRule;

class NoneDivisionForDirector implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            Fonction::find(request()->fonction_id)->fonction === 'Directeur' &&
            Division::find(request()->division_id)->division !== 'Aucune'
        ) {
            $fail('Le Directeur n\'appartient à aucune division.');
        }
    }
}
