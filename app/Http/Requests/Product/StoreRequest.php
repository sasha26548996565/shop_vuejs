<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'new_price' => 'nullable|integer',
            'count' => 'required|integer',
            'preview_image' => 'required|file',
            'is_published' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'required|integer|exists:tags,id',
            'colors' => 'required|array',
            'colors.*' => 'required|integer|exists:colors,id',
        ];
    }
}
