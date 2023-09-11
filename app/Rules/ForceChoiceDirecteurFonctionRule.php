<?php

namespace App\Rules;

use App\Models\Fonction;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ForceChoiceDirecteurFonctionRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $fonction = Fonction::where('fonction', 'Directeur')->get()->toArray();
        if(!in_array($fonction[0]['id'], request()->fonctions))
        {
            $fail('Le Directeur doit avoir accès au document.');
        }
    }
}
