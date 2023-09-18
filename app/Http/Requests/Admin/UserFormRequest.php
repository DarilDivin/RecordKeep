<?php

namespace App\Http\Requests\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Rules\SameTypeRoleRule;
use App\Rules\UserBirthDayRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    use PasswordValidationRules;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'matricule' => ['required','integer', 'min:6', Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'nom' => ['required', 'string'],
            'prenoms' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'datenaissance' => ['required', 'date', new UserBirthDayRule()],
            'sexe' => ['required', 'string'],
            'roles' => ['array','exists:roles,id', 'required', new SameTypeRoleRule()],
            /* 'permissions' => ['array','exists:permissions,id', 'required'], */
            'password' => $this->passwordRules(),
            'fonction_id' => ['integer','exists:fonctions,id', 'required'],
            'division_id' => ['integer','exists:divisions,id', 'nullable'],
            'service_id' => ['integer','exists:services,id', 'nullable'],
            'direction_id' => ['integer','exists:directions,id', 'required'],
        ];
    }
}
