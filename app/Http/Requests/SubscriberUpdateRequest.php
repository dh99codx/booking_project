<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberUpdateRequest extends FormRequest
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
            'status' => ['required', 'boolean'],
            'email' => ['required', 'email:rfc,dns'],
            'subscriber_type_id' => ['required', 'exists:subscriber_types,id'],
            'frequency_id' => ['required', 'exists:frequencies,id'],
        ];
    }
}
