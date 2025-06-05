<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'author' => 'nullable|string|max:255', 
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        if (!$this->has('author') || $this->input('author') === null) {
            $this->merge([
                'author' => 'anonymous',
            ]);
        }
    }
}
