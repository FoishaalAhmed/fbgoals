<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string',
            'address' => 'required|string',
            'permission' => 'required|array',
            'permission.*' => 'required|string|exists:permissions,name'
        ];

        if ($this->getMethod() == 'POST') {
            return $rules + [
                'password' => 'required|string|min:6|confirmed',
                'email'    => 'required|string|max:190|unique:users,email',
                'phone'    => 'required|string|max:15|unique:users,phone',
            ];
        } else {
            return $rules + [
                'email'    => 'required|string|max:190|unique:users,email,'. $this->user->id,
                'phone'    => 'required|string|max:15|unique:users,phone,'. $this->user->id,
            ];
        }
    }
}
