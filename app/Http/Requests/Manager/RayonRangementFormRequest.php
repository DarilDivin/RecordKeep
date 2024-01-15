<?php

namespace App\Http\Requests\Manager;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RayonRangementFormRequest extends FormRequest
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
                Rule::unique('rayon_rangements')
                ->ignore($this->route()->parameter('rayon'))
                ->withoutTrashed()
            ],
            'boites_number_max' => ['required', 'min:1', 'numeric', 'integer'],
        ];
    }
}
