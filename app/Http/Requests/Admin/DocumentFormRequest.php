<?php

namespace App\Http\Requests\Admin;

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
            'nom' => ['required', 'string'],
            'signature' => ['required', 'string', Rule::unique('documents')->ignore($this->route()->parameter('document'))],
            'code' => ['nullable', 'string', Rule::unique('documents')->ignore($this->route()->parameter('document'))],
            'objet' => ['required', 'string'],
            'source' => ['nullable', 'string'],
            'dua' => ['required', 'integer'],
            'emetteur' => ['required', 'string'],
            'recepteur' => ['required', 'string'],
            'motclefs' => ['nullable', 'string'],
            'datecreation' => ['required', 'date'],
            'disponibilite' => ['nullable', 'boolean'],
            'archive' => ['nullable', 'boolean'],
            'nature_document_id' => ['required', 'exists:nature_documents,id'],
            'chemise_dossier_id' => ['nullable', 'exists:chemise_dossiers,id'],
            'division_id' => ['required', 'exists:divisions,id', 'integer'],
            'service_id' => ['required', 'exists:services,id', 'integer'],
            'direction_id' => ['required', 'exists:directions,id', 'integer'],
            'document' => ['required',  'mimes:pdf',  'max:500000'],
            'fonction' => ['required', 'array', 'exists:fonctions,id']
        ];
    }
}
