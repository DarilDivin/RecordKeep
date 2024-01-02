<?php

namespace App\Rules;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameDivisionForService implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $divisions = request()->route()->getName() === 'admin.division.store'
                ? Service::find(request()->service_id)->divisions
                : Service::find(request()->service_id)->divisions->where('id', '!=', request()->route()->parameter('division')['id']);
        $divisions->each(function ($division) use ($fail) {
            if (strtolower($division->division) === strtolower(request()->division)) {
                $fail('Cette Division existe déjà pour le service spécifié.');
            }
        });
    }
}
