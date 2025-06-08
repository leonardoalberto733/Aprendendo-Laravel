<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JornalistRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:896',
            'email' => 'required|email|max:100',
            'workPlace' => 'required|string|max:100',
            'salary' => 'required|numeric|between:1412,999999.99',
        ];
    }
}
