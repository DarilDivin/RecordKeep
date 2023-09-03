<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueMotCleRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach(array_count_values(request()->motclefs) as $motclef) {
            if($motclef > 1){
                $fail('Le champ :attribute ne doit pas contenir deux mots clés de même valeur.');
            }
        }
    }
}