<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileStoreDashboardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'contact_number_landline' => ['required', 'digits:10'],
            'mobile_number' => ['required', 'digits:10'],
            'gothram' => ['required', 'max:255', 'string','min:3'],
            'rashi' => ['required', 'max:255', 'string','min:3'],
            'natchatram' => ['required', 'max:255', 'string','min:3'],
            'given_name' => ['required', 'max:255','min:3', 'string'],
            'middle_name' => ['required', 'max:255','min:3', 'string'],
            'family_name' => ['required', 'max:255','min:3', 'string'],
            'address' => ['required', 'max:255','min:3', 'string'],
            'dob' => ['required', 'date'],
        ];
    }


}
