<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required|string|max:255',
            'mobile_no' => 'required|string|max:255',
            'email'    => 'required|email|unique:partners',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[0-9]).{8,}$/',
            ],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Please enter a strong password with at least one uppercase letter, one lowercase letter, one special character, and one digit.',
        ];
    }
}
