<?php

namespace App\Rules;

use App\Models\RayonRangement;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameBoiteForRayon implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $boites = request()->route()->getName() === 'manager.boite.store'
                ? RayonRangement::find(request()->rayon_rangement_id)->boitearchives
                : RayonRangement::find(request()->rayon_rangement_id)->boitearchives->where('id', '!=', request()->route()->parameter('boite')['id']);
        $boites->each(function ($boite) use ($fail) {
            if (strtolower($boite->libelle) === strtolower(request()->libelle)) {
                $fail('Cette Boîte existe déjà pour ce Rayon de rangement.');
            }
        });
    }
}
