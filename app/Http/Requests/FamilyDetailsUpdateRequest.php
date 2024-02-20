<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyDetailsUpdateRequest extends FormRequest
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
            'middle_name' => ['nullable', 'max:255','min:3','string'],
            'family_name' => ['required', 'max:255','min:3','string'],
            'email_address' => ['nullable', 'unique:users,email', 'email:rfc,dns'],
            'contact_number' => ['nullable', 'digits:10'],
            'dob' => ['required', 'date'],
            'relationship' => ['required', 'max:255','min:3','string'],
            'gothram' => ['nullable', 'max:255', 'string','min:3'],
            'rashi' => ['nullable', 'max:255', 'string','min:3'],
            'natchatram' => ['nullable', 'max:255', 'string','min:3'],
        ];
    }
}
