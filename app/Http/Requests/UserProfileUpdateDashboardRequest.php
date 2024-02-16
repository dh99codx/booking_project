<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateDashboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact_number_landline'=>['nullable','numeric'],
            'profile_picture' => ['image', 'max:1024', 'nullable'],
            'gothram' => ['nullable', 'max:255', 'string'],
            'rashi' => ['nullable', 'max:255', 'string'],
            'natchatram' => ['nullable', 'max:255', 'string'],
            'given_name' => ['required', 'max:255','min:3','string'],
            'middle_name' => ['required', 'max:255','min:3','string'],
            'family_name' => ['required', 'max:255','min:3','string'],
            'address' => ['required', 'max:255', 'string','min:3'],
            'dob' => ['required', 'date'],
            'mobile_number' => ['required'],
        ];
    }
}
