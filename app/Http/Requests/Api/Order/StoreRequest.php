<?php

namespace App\Http\Requests\Api\Order;

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
            'totalPrice' => 'required|integer',
            'products' => 'required|array',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'patronymic' => 'required|string',
            'gender' => 'required|boolean',
            'email' => 'required|email',
            'address' => 'required|string',
        ];
    }
}
