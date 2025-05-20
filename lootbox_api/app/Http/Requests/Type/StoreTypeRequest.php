<?php

namespace App\Http\Requests\Type;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'min' => 'required|numeric',
            'max' => 'required|numeric|gt:min',
            'unity' => 'required|string|max:50',
            'challenge' => 'nullable|string|max:255',
            'general' => 'nullable|string|max:255',
            'half_god' => 'nullable|string|max:255',
            's_ranked' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ];
    }
} 