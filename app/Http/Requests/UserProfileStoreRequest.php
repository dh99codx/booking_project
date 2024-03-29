<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileStoreRequest extends FormRequest
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
            'contact_number_landline'=>['nullable','numeric'],
            'profile_picture' => ['image', 'max:1024', 'nullable'],
            'gothram' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'rashi' => ['required', 'max:255', 'string'],
            'natchatram' => ['required', 'max:255', 'string'],
        ];
    }
}
