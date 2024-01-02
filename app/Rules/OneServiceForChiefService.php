<?php

namespace App\Rules;

use Closure;
use App\Models\Fonction;
use App\Models\Service;
use Illuminate\Contracts\Validation\ValidationRule;

class OneServiceForChiefService implements ValidationRule
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
            Service::find(request()->service_id)->service === 'Aucun'
        ) {
            $fail('Le Chef Service doit appartenir à un service.');
        }
    }
}
