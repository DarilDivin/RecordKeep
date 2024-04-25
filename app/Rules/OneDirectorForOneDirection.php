<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use App\Models\Fonction;
use App\Models\Direction;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Builder;

class OneDirectorForOneDirection implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $routeName = request()->route()->getName();
        $sigle = Direction::find(request()->direction_id)->sigle;
        $directionId = (int)request()->direction_id;
        $fonctionId = (int)request()->fonction_id;
        $routeParameter = request()->route()->parameter('user');
        $directorFonctionId = Fonction::where('fonction', 'Directeur')->first()->id;
        $directeursNumber = User::whereHas('direction',
            fn (Builder $query) => $query->where('id', $directionId)
        )->whereHas('fonction', fn ($query) => $query->where('fonction', 'Directeur'))
        ->count();

        if (
            $routeName === 'user.register'
            && $directeursNumber > 0
            && $fonctionId === $directorFonctionId
        )
        $fail('Il existe déjà un Directeur à la '. $sigle);

        elseif (
            $routeName === 'admin.user.update'
            && $directeursNumber > 0
            && $fonctionId ===  $directorFonctionId
            && $routeParameter->fonction_id !==  $directorFonctionId
        )
        $fail('Il existe déjà un Directeur à la '. $sigle);

        elseif (
            $routeName === 'admin.user.update'
            && $directeursNumber > 0
            && $fonctionId ===  $directorFonctionId
            && $routeParameter->fonction_id !==  $directorFonctionId
            && $directionId !== $routeParameter->direction_id
        )
        $fail('Il existe déjà un Directeur à la '. $sigle);

    }
}
