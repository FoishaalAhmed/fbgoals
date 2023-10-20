<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'content' => 'required|string',
            'position' => 'required|string|in:Header,Footer,Both',
        ];

        if ($this->getMethod() == 'POST') {
            return $rules + [
                'title'    => 'required|string|max:190|unique:pages,title',
            ];
        } else {
            return $rules + [
                'title' => 'required|string|max:255|unique:pages,title,' . $this->page->id,
                'status' => 'required|string|max:15|in:Active,Inactive',
            ];
        }
    }
}
