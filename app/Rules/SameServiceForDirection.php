<?php

namespace App\Rules;

use App\Models\Direction;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameServiceForDirection implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $services = request()->route()->getName() === 'admin.service.store'
                ? Direction::find(request()->direction_id)->services
                : Direction::find(request()->direction_id)->services->where('id', '!=', request()->route()->parameter('service')['id']);
        $services->each(function ($service) use ($fail) {
            if (strtolower($service->service) === strtolower(request()->service)) {
                $fail('Ce Service existe déjà pour la direction spécifiée.');
            }
        });
    }
}
