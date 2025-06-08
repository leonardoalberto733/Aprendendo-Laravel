<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
        return [
            'local' => 'required|string|min:1|max:80',
            'description' => 'required|string|max:500',
            'placeholder' => 'nullable|string|max:80',
            'image' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'news_id' => 'required|integer'
        ];
    }
}
