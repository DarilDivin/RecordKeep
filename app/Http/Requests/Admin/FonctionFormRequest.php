<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FonctionFormRequest extends FormRequest
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
            'fonction' => ['required', 'string',
                Rule::unique('fonctions')
                ->ignore($this->route()->parameter('fonction'))
                ->withoutTrashed()
            ],
        ];
    }
}
