<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use App\Models\Fonction;
use Illuminate\Database\Eloquent\Builder;
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
        $chiefsDivisionsNumber = User::whereHas('division',
            fn (Builder $query) => $query->where('id', request()->division_id)
        )->whereHas('fonction', fn ($query) => $query->where('fonction', 'Chef Division'))
        ->count();
        if (
            $routeName === 'user.register'
            && $chiefsDivisionsNumber > 0
            && (int)request()->fonction_id === Fonction::where('fonction', 'Chef Division')->first()->id
        )
        $fail('Il existe déjà un chef division dans la division spécifiée');

        elseif (
            $routeName === 'admin.user.update'
            && $chiefsDivisionsNumber > 0
            && (int)request()->fonction_id === Fonction::where('fonction', 'Chef Division')->first()->id
            &&
            (
                request()->route()->parameter('user')->fonction_id !== Fonction::where('fonction', 'Chef Division')->first()->id
                || (int)request()->division_id !== request()->route()->parameter('user')->division_id
            )
        )
        $fail('Il existe déjà un chef division dans la division spécifiée');
    }
}
