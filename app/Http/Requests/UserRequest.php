<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:100',
            'email'=> 'required|string|email|max:100|unique:users',
            'password'=> 'required|string|min:8'
        ];
    }
}
