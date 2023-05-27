<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::user()->hasRole('superAdmin')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'first_name' => 'string|max:255',
            'email' => 'email',
            'address' => 'string|max:255',
            'city' => 'string|max:255',
            'zip_code' => 'string|max:255',
            'phone' => 'string|max:30',
            'role' => 'in:user,admin,superAdmin'
        ];
    }
}
