<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
                Rule::unique('roles')
                ->ignore($this->route()->parameter('role'))
                ->withoutTrashed()
            ],
            'permissions' => ['required', 'array', 'exists:permissions,id'],
            'type_role_id' => ['required', 'integer', 'exists:type_roles,id'],
        ];
    }
}
