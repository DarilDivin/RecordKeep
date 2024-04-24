<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use App\Models\Fonction;
use App\Models\Direction;
use Illuminate\Contracts\Validation\ValidationRule;

class OneDirectorForOneDirection implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $directeursNumber = User::whereHas('direction',
            fn ($query) => $query->where('id', request()->direction_id)
        )->whereHas('fonction', fn ($query) => $query->where('fonction', 'Directeur'))
        ->count();
        if ($directeursNumber > 0 && (int)request()->fonction_id === Fonction::where('fonction', 'Directeur')->first()->id)
        $fail('Il existe déjà un Directeur à la '. Direction::find(request()->direction_id)->sigle);
    }
}
