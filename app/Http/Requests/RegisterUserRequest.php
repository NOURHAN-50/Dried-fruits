<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:11|max:15|unique:users,phone',
            'password' => 'required|min:6',
        ];
    }
    public function messages(): array
    {
        return [
        'name.required' => 'Name is required',
        'name.string' => 'Name must be a valid text',
        'email.required' => 'Email is required',
        'email.email' => 'Please enter a valid email',
        'email.unique' => 'This email is already taken',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters',
    ];


    }
}
