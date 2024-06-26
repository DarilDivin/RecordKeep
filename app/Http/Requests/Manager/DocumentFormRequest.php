<?php

namespace App\Http\Requests\Manager;

use App\Rules\DocumentBirthdayRule;
use App\Rules\ForceChoiceDirecteurFonctionRule;
use App\Rules\ForceChoiceUserDiretionRule;
use App\Rules\ForceToChoiceAllFunctionsForVisiblesDocuments;
use Illuminate\Validation\Rule;
use App\Rules\UniqueAndMaxMotCleRule;
use Illuminate\Foundation\Http\FormRequest;

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
        if(request()->routeIs('manager.document.store')){
            $documentRules = 'required|mimes:pdf|max:500000';
        }elseif(request()->routeIs('manager.document.update')){
            $documentRules = 'sometimes|mimes:pdf|max:500000';
        }

        return [
            /* 'nom' => ['required', 'string'], */
            'reference' => [
                'nullable', 'string',
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
            'expediteur' => ['nullable', 'string'],
            'destinataire' => ['nullable', 'string'],
            'datecreation' => ['required', 'date', 'date_format:Y-m-d', /* 'before_or_equal:today', */ new DocumentBirthdayRule()],
            'disponibilite' => ['nullable', 'boolean'],
            'archive' => ['nullable', 'boolean'],
            'nature_document_id' => ['required', 'exists:nature_documents,id'],
            'chemise_dossier_id' => ['nullable', 'exists:chemise_dossiers,id'],
            'division_id' => ['required', 'exists:divisions,id', 'integer'],
            'service_id' => ['required', 'exists:services,id', 'integer'],
            'direction_id' => ['required', 'exists:directions,id', 'integer', new ForceChoiceUserDiretionRule()],
            'document' => $documentRules,
            'fonctions' => [
                'required', 'array', 'exists:fonctions,id',
                new ForceChoiceDirecteurFonctionRule(),
                new ForceToChoiceAllFunctionsForVisiblesDocuments()
            ],
            'motclefs' => ['nullable', 'array', new UniqueAndMaxMotCleRule()]
        ];
    }
}
