<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PermissionFormRequest extends FormRequest
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
            'name' => ['required', 'string',
                Rule::unique('permissions')
                ->ignore($this->route()->parameter('permission'))
            ],
            'roles' => ['required', 'array', 'exists:roles,id'],
            'type_role_id' => ['required', 'integer', 'exists:type_roles,id']
        ];
    }
}
