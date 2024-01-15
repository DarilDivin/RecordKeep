<?php

namespace App\Rules;

use App\Models\BoiteArchive;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyIfBoiteHasAgainOnePlace implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            BoiteArchive::find(request()->boite_archive_id)->chemisedossiers->count() ==
            BoiteArchive::find(request()->boite_archive_id)->chemises_number_max
        ) $fail("La Boîte Archive spécifiée a atteint son nombre de chemises maximum.");
    }
}
