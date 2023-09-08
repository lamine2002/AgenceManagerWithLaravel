<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => ['required', 'min:8'],
            'description' => ['required', 'min:8'],
            'surface' => ['required', 'min:10', 'integer'],
            'rooms' => ['required', 'min:1', 'integer'],
            'bedrooms' => ['required', 'min:0', 'integer'],
            'floor' => ['required', 'min:0', 'integer'],
            'price' => ['required', 'min:0', 'integer'],
            'city' => ['required', 'min:5'],
            'address' => ['required', 'min:4'],
            'postal_code' => ['required', 'min:5'],
            'sold' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id', 'required']
        ];
    }
}
