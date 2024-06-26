<?php

namespace App\Http\Requests\Admin;

use App\Rules\SameTypeRoleRule;
use App\Rules\UserBirthDayRule;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use App\Rules\NoneServiceForDirector;
use App\Rules\NoneDivisionForDirector;
use App\Rules\OneServiceForChiefService;
use App\Rules\OneDirectorForOneDirection;
use App\Rules\OneServiceForChiefDivision;
use App\Rules\NoneDivisionForChiefService;
use App\Rules\OneDivisionForChiefDivision;
use App\Rules\ForceCentralManagerToBeAtDSI;
use App\Rules\OneChiefServiceForOneService;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OneStandardManagerForDirection;
use App\Rules\OneCentralManagerForApplication;
use App\Actions\Fortify\PasswordValidationRules;
use App\Rules\OneChiefDivisionForOneDivision;

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
            'matricule' => [
                'required','integer', 'min:6',
                Rule::unique('users')
                ->ignore($this->route()->parameter('user'))
                ->withoutTrashed()
            ],
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string'],
            'email' => [
                'required', 'email',
                Rule::unique('users')
                ->ignore($this->route()->parameter('user'))
                ->withoutTrashed()
            ],
            'datenaissance' => ['required', 'date', 'date_format:Y-m-d', /* 'before_or_equal:today', */ new UserBirthDayRule()],
            'sexe' => ['required', 'string'],
            'roles' => ['sometimes', 'array','exists:roles,id', 'required',
                new SameTypeRoleRule(), new ForceCentralManagerToBeAtDSI(),
                new OneStandardManagerForDirection(),
                new OneCentralManagerForApplication(),
            ],
            /* 'password' => ['sometimes', 'string', new Password(), 'confirmed'], */
            'password' => $this->passwordRules(),
            'fonction_id' => ['integer','exists:fonctions,id', 'required', new OneDirectorForOneDirection(),
                new OneChiefServiceForOneService(), new OneChiefDivisionForOneDivision()
            ],
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
