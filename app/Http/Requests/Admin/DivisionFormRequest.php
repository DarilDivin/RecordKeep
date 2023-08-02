<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DivisionFormRequest extends FormRequest
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
            'division' => ['required', 'string', 'min:3',
                Rule::unique('divisions')
                ->ignore($this->route()->parameter('division'))
                ->withoutTrashed()
            ],
            'sigle' => ['required', 'string', 'min:2'],
            'service_id' => ['integer','exists:services,id', 'required'],
        ];
    }
}
