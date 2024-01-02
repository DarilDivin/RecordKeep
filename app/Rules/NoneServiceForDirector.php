<?php

namespace App\Rules;

use App\Models\Fonction;
use App\Models\Service;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoneServiceForDirector implements ValidationRule
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
            Service::find(request()->service_id)->service !== 'Aucun'
        ) {
            $fail('Le Directeur n\'appartient à aucun service.');
        }
    }
}
