<?php

namespace App\Http\Requests;

use App\Rules\SamePasswordEnteredByUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ChangePasswordRequest extends FormRequest
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
            'password' => ['required','string', 'min:8', 'confirmed', new SamePasswordEnteredByUser()],
            'password_confirmation' => ['required', 'min:8']
        ];
    }
}
