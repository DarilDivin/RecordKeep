<?php

namespace App\Http\Requests\Manager;

use App\Rules\UniqueMotCleRule;
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
        if(request()->routeIs('admin.document.store')){
            $documentRule = 'required|mimes:pdf|max:500000';
        }elseif(request()->routeIs('admin.document.update')){
            $documentRule = 'sometimes|mimes:pdf|max:500000';
        }

        return [
            'nom' => ['required', 'string'],
            'signature' => [
                'required', 'string',
                Rule::unique('documents')
                ->where(function ($query){
                    return $query->whereNull('deleted_at');
                })->ignore($this->route()->parameter('document'))
            ],
            'code' => [
                'nullable', 'string',
                Rule::unique('documents')
                ->where(function ($query){
                    return $query->whereNull('deleted_at');
                })->ignore($this->route()->parameter('document'))],
            'objet' => ['required', 'string'],
            'source' => ['required', 'string'],
            'dua' => ['required', 'integer'],
            'emetteur' => ['required', 'string'],
            'recepteur' => ['required', 'string'],
            'datecreation' => ['required', 'date'],
            'disponibilite' => ['nullable', 'boolean'],
            'archive' => ['nullable', 'boolean'],
            'nature_document_id' => ['required', 'exists:nature_documents,id'],
            'categorie_id' => ['required', 'exists:categories,id', 'integer'],
            'chemise_dossier_id' => ['nullable', 'exists:chemise_dossiers,id'],
            'division_id' => ['required', 'exists:divisions,id', 'integer'],
            'service_id' => ['required', 'exists:services,id', 'integer'],
            'direction_id' => ['required', 'exists:directions,id', 'integer'],
            'document' => $documentRule,
            'fonction' => ['required', 'array', 'exists:fonctions,id'],
            'motclefs' => ['required', 'array', new UniqueMotCleRule()]
        ];
    }
}
