<?php

namespace Flagstudio\AuthFlag\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
}
