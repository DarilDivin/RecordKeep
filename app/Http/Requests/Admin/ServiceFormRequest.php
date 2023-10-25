<?php

namespace App\Http\Requests\Admin;

use App\Rules\SameServiceForDirection;
use Illuminate\Foundation\Http\FormRequest;

class ServiceFormRequest extends FormRequest
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
            'service' => ['required', 'string', 'min:3', new SameServiceForDirection()],
            'sigle' => ['required', 'string', 'min:2'],
            'direction_id' => ['integer','exists:directions,id', 'required']
        ];
    }
}
