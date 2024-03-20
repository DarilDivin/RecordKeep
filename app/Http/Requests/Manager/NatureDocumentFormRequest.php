<?php

namespace App\Http\Requests\Manager;

use App\Rules\DCRule;
use App\Rules\DUAAtDesksRule;
use App\Rules\DUAAtSPARRule;
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
            'duree_communicabilite' => ['required', 'integer', 'numeric', new DCRule()],
            'dua_bureaux' => ['required', 'integer', 'numeric', new DUAAtDesksRule()],
            'dua_service_pre_archivage' => ['required', 'integer', 'numeric', new DUAAtSPARRule()],
            'categorie_id' => ['required', 'exists:categories,id', 'integer'],
            'visible' => ['required', 'boolean'],
        ];
    }
}
