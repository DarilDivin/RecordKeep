<?php

namespace App\Http\Requests\Manager;

use App\Rules\DUAAtDesks;
use App\Rules\DUAAtSPAR;
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
            'dua1' => ['required', 'integer', new DUAAtDesks()],
            'dua2' => ['required', 'integer', new DUAAtSPAR()],
            'categorie_id' => ['required', 'exists:categories,id', 'integer'],
        ];
    }
}
