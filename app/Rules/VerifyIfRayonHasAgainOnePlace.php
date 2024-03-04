<?php

namespace App\Rules;

use App\Models\RayonRangement;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyIfRayonHasAgainOnePlace implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $boites = request()->route()->getName() === 'manager.boite.store'
                ? RayonRangement::find(request()->rayon_rangement_id)->boitearchives->count()
                : RayonRangement::find(request()->rayon_rangement_id)
                  ->boitearchives->where('id', '!=', request()->route()->parameter('boite')['id'])
                  ->count();

        if ($boites == RayonRangement::find(request()->rayon_rangement_id)->boites_number_max)
        $fail("Le rayon de rangement spécifié a atteint son nombre de boîtes maximum.");
    }
}
