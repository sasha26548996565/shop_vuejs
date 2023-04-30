<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'categories' => 'nullable|array',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
            'priceFrom' => 'nullable|integer',
            'priceTo' => 'nullable|integer',
            'sort' => 'nullable|string',
            'page' => 'required|integer',
        ];
    }
}
