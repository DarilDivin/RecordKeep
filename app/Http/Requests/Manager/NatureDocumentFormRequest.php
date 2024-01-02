<?php

namespace App\Http\Requests\Manager;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NatureDocumentFormRequest extends FormRequest
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
            'nature' => ['required', 'string',
                Rule::unique('nature_documents')
                ->ignore($this->route()->parameter('nature'))
                ->withoutTrashed()
            ],
            'dua' => ['required', 'integer'],
            'categorie_id' => ['required', 'exists:categories,id', 'integer'],
        ];
    }
}
