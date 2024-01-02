<?php

namespace App\Rules;

use App\Models\BoiteArchive;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameChemiseForBoite implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $chemises = request()->route()->getName() === 'manager.chemise.store'
                ? BoiteArchive::find(request()->boite_archive_id)->chemisedossiers
                : BoiteArchive::find(request()->boite_archive_id)->chemisedossiers->where('id', '!=', request()->route()->parameter('chemise')['id']);
        $chemises->each(function ($chemise) use ($fail) {
            if (strtolower($chemise->libelle) === strtolower(request()->libelle)) {
                $fail('Cette Chemise existe déjà pour cette Boîte archive.');
            }
        });
    }
}
