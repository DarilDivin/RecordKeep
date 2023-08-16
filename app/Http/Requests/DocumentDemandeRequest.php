<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentDemandeRequest extends FormRequest
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
            // 'nom' => ['required', 'string'],
            // 'prenoms' => ['required', 'string'],
            'motif' => ['required', 'string'],
            // 'email' => ['required', 'string', 'min:4'],
            // 'telephone' => ['required', 'string', 'min:8'],
            'duree' => ['required', 'integer', 'max:30'],
        ];
    }
}
