<?php

namespace App\Rules;

use App\Models\Fonction;
use App\Models\NatureDocument;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ForceToChoiceAllFunctionsForVisiblesDocuments implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $functionsIds = [];
        $functions = Fonction::all()->toArray();
        array_map(function ($function) use (&$functionsIds) {
            $functionsIds[] = $function['id'];
        }, $functions);

        if (NatureDocument::find(request()->nature_document_id)->visible === 1) {
            if (
                /* array_intersect(request()->fonctions, $functionsIds) !== count($functionsIds) */
                count($functionsIds) !== count(request()->fonctions)
            )
            $fail("Le document doit être visble par toutes les fonctions.");
        }
    }
}
