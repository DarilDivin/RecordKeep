<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentFormRequest extends FormRequest
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
            'signature' => ['required', 'string', Rule::unique('documents')->ignore($this->route()->parameter('document'))],
            'code' => ['required', 'string', Rule::unique('documents')->ignore($this->route()->parameter('document'))],
            'objet' => ['required', 'string'],
            'source' => ['nullable', 'string'],
            'dua' => ['required', 'date'],
            'emetteur' => ['required', 'string'],
            'recepteur' => ['required', 'string'],
            'motclefs' => ['required', 'string'],
            'datecreation' => ['required', 'date'],
            'disponibilite' => ['required', 'boolean'],
            'archive' => ['required', 'boolean'],
            'nature_document_id' => ['integer', 'nullable', 'exists:nature,id'],
            'chemise_dossier_id' => ['integer', 'nullable', 'exists:nature,id'],
            'division_id' => ['integer', 'nullable', 'exists:nature,id'],
            'service_id' => ['integer', 'nullable', 'exists:nature,id'],
            'direction_id' => ['integer', 'nullable', 'exists:nature,id'],
        ];
    }
}
