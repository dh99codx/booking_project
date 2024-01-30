<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'given_name' => ['required', 'max:255','min:3','string'],
            'middle_name' => ['required', 'max:255','min:3','string'],
            'family_name' => ['required', 'max:255','min:3','string'],
            'dob' => ['required', 'date'],
            'address' => ['required', 'max:255', 'string','min:3'],
            'mobile_number' => ['required', 'digits:10'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns'],
            'password' => ['required'],
            'news_letter_subscription' => ['required', 'boolean'],
            'privacy_policy_and_terms_of_condition' => ['required', 'boolean'],
            'roles' => 'array',
        ];
    }
}
