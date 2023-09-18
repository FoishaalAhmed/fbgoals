<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [
            'content' => 'required|string|max: 191',
            'tags' => 'required',
            'date' => 'required|date',
            'photo' => 'mimes: jpeg,jpg,png,gif,webp|max: 1000|nullable'
        ];

        if ($this->getMethod() == 'POST') {
            return $rules + [
                'title'    => 'required|string|max:190|unique:news,title',
            ];
        } else {
            return $rules + [
                'title' => 'required|string|max:255|unique:news,title,' . $this->news->id,
                'status' => 'required|string|max:15|in:Published,Unpublished',
            ];
        }
    }
}
