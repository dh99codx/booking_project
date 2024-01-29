<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255','min:3', 'string'],
            'family_name' => ['required', 'max:255','min:3', 'string'],
            'dob' => ['required', 'date'],
            'address' => ['required', 'max:255', 'string','min:3'],
            'mobile_number' => ['required', 'digits:10'],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user),
                'email:rfc,dns',
            ],
            'password' => ['nullable'],
            'news_letter_subscription' => ['required', 'boolean'],
            'privacy_policy_and_terms_of_condition' => ['required', 'boolean'],
            'roles' => 'array',
        ];
    }
}
