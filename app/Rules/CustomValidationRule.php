<?php

namespace App\Rules;

use Closure;
use App\Models\Role;
use Illuminate\Contracts\Validation\ValidationRule;

class SameTypeRoleRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach(request()->roles as $roleId){
            $roles[] = Role::find($roleId)->toArray();
        }
        foreach($roles as $role){
            $typeroleIds[] = $role['type_role_id'];
        }
        foreach(array_count_values($typeroleIds) as $k => $v){
            if($v > 1){
                $fail('Le champ :attribute ne doit pas contenir deux rôles de même type.');
            }
        }
    }
}
