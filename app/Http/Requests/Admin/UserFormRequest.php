<?php

namespace App\Http\Requests\Admin;

use App\Rules\SameTypeRoleRule;
use App\Rules\UserBirthDayRule;
use Illuminate\Validation\Rule;
use App\Rules\NoneServiceForDirector;
use App\Rules\NoneDivisionForDirector;
use App\Rules\OneServiceForChiefService;
use App\Rules\OneServiceForChiefDivision;
use App\Rules\NoneDivisionForChiefService;
use App\Rules\OneDivisionForChiefDivision;
use App\Rules\ForceCentralManagerToBeAtDSI;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OneCentralManagerForApplication;
use App\Actions\Fortify\PasswordValidationRules;

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
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'datenaissance' => ['required', 'date', new UserBirthDayRule()],
            'sexe' => ['required', 'string'],
            'roles' => ['array','exists:roles,id', 'required',
                new SameTypeRoleRule(), new ForceCentralManagerToBeAtDSI(),
                new OneCentralManagerForApplication()
            ],
            'password' => $this->passwordRules(),
            'fonction_id' => ['integer','exists:fonctions,id', 'required'],
            'division_id' => [
                'integer','exists:divisions,id', 'required',
                new NoneDivisionForDirector(),new NoneDivisionForChiefService(),
                new OneDivisionForChiefDivision()
            ],
            'service_id' => [
                'integer','exists:services,id', 'required',
                new NoneServiceForDirector(), new OneServiceForChiefService(),
                new OneServiceForChiefDivision()
            ],
            'direction_id' => ['integer','exists:directions,id', 'required'],
        ];
    }
}
