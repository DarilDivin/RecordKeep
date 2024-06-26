<?php

namespace App\Http\Requests\Manager;

use App\Rules\SameChemiseForBoite;
use App\Rules\VerifyIfBoiteHasAgainOnePlace;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChemiseDossierFormRequest extends FormRequest
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
            'libelle' => ['required', 'string', new SameChemiseForBoite()],
            'boite_archive_id' => ['required', 'exists:boite_archives,id', 'integer', new VerifyIfBoiteHasAgainOnePlace()],
        ];
    }
}
