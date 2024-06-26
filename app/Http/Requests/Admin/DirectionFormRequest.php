<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DirectionFormRequest extends FormRequest
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
            'direction' => ['required', 'string', 'min:3',
                Rule::unique('directions')
                ->ignore($this->route()->parameter('direction'))
                ->withoutTrashed()
            ],
            'sigle' => ['required', 'string', 'min:2'],
        ];
    }
}
