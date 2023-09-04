<?php

namespace App\Http\Requests\Manager;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BoiteArchiveFormRequest extends FormRequest
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
            'libelle' => ['required', 'string',
                Rule::unique('boite_archives')
                ->ignore($this->route()->parameter('boite'))
                ->withoutTrashed()
        ],
        'rayon_rangement_id' => ['required', 'exists:rayon_rangements,id', 'integer'],
        ];
    }
}
