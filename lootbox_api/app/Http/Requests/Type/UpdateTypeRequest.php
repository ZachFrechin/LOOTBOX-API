<?php

namespace App\Http\Requests\Type;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'min' => 'sometimes|numeric',
            'max' => 'sometimes|numeric|gt:min',
            'unity' => 'sometimes|string|max:50',
            'challenge' => 'nullable|string|max:255',
            'general' => 'nullable|string|max:255',
            'half_god' => 'nullable|string|max:255',
            's_ranked' => 'nullable|string|max:255',
            'category_id' => 'sometimes|exists:categories,id'
        ];
    }
} 