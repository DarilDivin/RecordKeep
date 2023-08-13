<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClassementFormRequest extends FormRequest
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
            'signature' => [
                'required', 'string',
                Rule::unique('documents')
                ->where(function ($query){
                    return $query->whereNull('deleted_at');
                })->ignore($this->route()->parameter('document'))
            ],
            'objet' => ['required', 'string'],
            'emetteur' => ['required', 'string'],
            'recepteur' => ['required', 'string'],
            'chemise_dossier_id' => ['required', 'exists:chemise_dossiers,id', 'integer'],
            /* 'boite_archive_id' => ['required', 'exists:boite_archive,id', 'integer'], */
            /* 'rayon_rangement_id' => ['required', 'exists:rayon_rangement,id', 'integer'], */
            /* 'motclefs' => ['required', 'array'] */
            'archive' => ['required', Rule::in([1])],
        ];
    }
}
