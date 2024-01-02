<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueAndMaxMotCleRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        array_map(function ($motclef) use ($fail) {
            if($motclef > 1){
                $fail('Le champ :attribute ne doit pas contenir deux mots clés de même valeur.');
            }
        }, array_count_values(request()->motclefs));

        if(count(request()->motclefs ) > 3)
        {
            $fail('Vous ne pouvez pas dépasser 3 mots clés.');
        }
    }
}
