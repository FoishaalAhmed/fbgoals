<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'address' => 'nullable|string',
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:users,email,' . auth()->user()->id,
            'phone'   => 'required|string|max:15|unique:users,phone,' . auth()->user()->id,
        ];
    }
}
