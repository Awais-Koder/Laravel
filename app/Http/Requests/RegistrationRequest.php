<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:registers',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A nice title is required for the post.',
            'email.required' => 'Please add content for the post.',
            'password.required' => 'Please add content for the post.',
        ];
    }
}
