<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'matricule' => ['required','integer', 'min:6'],
            'nom' => ['required', 'string'],
            'prenoms' => ['required', 'string'],
            'email' => ['required', 'email'],
            'datenaissance' => ['required', 'date'],
            'sexe' => ['required', 'string'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'fonction_id' => ['integer','exists:fonctions,id', 'required'],
            'division_id' => ['integer','exists:divisions,id', 'required'],
        ];
    }
}
