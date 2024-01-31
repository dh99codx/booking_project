<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyDetailsStoreRequest extends FormRequest
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
            'given_name' => ['required', 'max:255', 'string'],
            'middle_name' => ['required', 'max:255', 'string'],
            'family_name' => ['required', 'max:255', 'string'],
            'email_address' => ['required', 'max:255', 'string'],
            'contact_number' => ['required', 'max:255', 'string'],
            'dob' => ['required', 'date'],
            'relationship' => ['required', 'max:255', 'string'],
            'gothram' => ['required', 'max:255', 'string'],
            'rashi' => ['required', 'max:255', 'string'],
            'natchatram' => ['required', 'max:255', 'string'],
        ];
    }
}
