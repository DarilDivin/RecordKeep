<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OneChiefDivisionForOneDivision implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $routeName = request()->route()->getName();
        $chiefsServiceNumber = User::whereHas('service',
            fn (Builder $query) => $query->where('id', request()->service_id)
        )->whereHas('fonction', fn ($query) => $query->where('fonction', 'Chef Service'))
        ->count();
        if (
            $routeName === 'user.register'
            && $chiefsServiceNumber > 0
            && (int)request()->fonction_id === Fonction::where('fonction', 'Chef Service')->first()->id
        )
        $fail('Il existe déjà un chef service dans le service spécifié');

        elseif (
            $routeName === 'admin.user.update'
            && $chiefsServiceNumber > 0
            && (int)request()->fonction_id === Fonction::where('fonction', 'Chef Service')->first()->id
            &&
            (
                request()->route()->parameter('user')->fonction_id !== Fonction::where('fonction', 'Chef Service')->first()->id
                || (int)request()->service_id !== request()->route()->parameter('user')->service_id
            )
        )
        $fail('Il existe déjà un chef service dans le service spécifié');
    }
}
