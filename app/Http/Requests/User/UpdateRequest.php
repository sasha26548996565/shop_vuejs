<?php

namespace App\Http\Requests\User;

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
            'first_name' => 'required|string',
            'patronymic' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'password' => 'required|string|confirmed'
        ];
    }
}
