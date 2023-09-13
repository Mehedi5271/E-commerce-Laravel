<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|min:5|unique:products',
            'price' => 'required',
            'description' => 'required',
        ];
    }

    public function messages() 
{
    return [
    'title.required' => 'Title bosao',
    'title.min' => 'Title a minimum 5 ta word a dite hobe',
    'price.required' => 'Price bosao',
    'description.required' => 'Description bosao',
    
];
}
}
