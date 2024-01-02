<?php

namespace App\Rules;

use Closure;
use App\Models\Service;
use App\Models\Fonction;
use Illuminate\Contracts\Validation\ValidationRule;

class OneServiceForChiefDivision implements ValidationRule
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
            Service::find(request()->service_id)->service === 'Aucun'
        ) {
            $fail('Le Chef Division doit appartenir à un service.');
        }
    }
}
