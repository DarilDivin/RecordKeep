<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'datenaissance' => ['required', 'date'],
            'sexe' => ['required', 'string'],
            'role_id' => ['integer','exists:roles,id', 'required'],
            'password' => ['required', 'string', 'min:4'],
            'fonction_id' => ['integer','exists:fonctions,id', 'required'],
            'division_id' => ['integer','exists:divisions,id', 'required'],
        ];
    }
}
