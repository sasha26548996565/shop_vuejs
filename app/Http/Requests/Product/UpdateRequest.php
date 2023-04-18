<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'preview_image' => 'nullable|file',
            'is_published' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'required|integer|exists:tags,id',
            'colors' => 'required|array',
            'colors.*' => 'required|integer|exists:colors,id',
        ];
    }
}
