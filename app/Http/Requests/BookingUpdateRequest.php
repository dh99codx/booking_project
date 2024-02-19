<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
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
            'Check_In' => ['required', 'date'],
            'Check_Out' => ['required', 'date'],
            'Booking_Reference_No' => ['required', 'max:255', 'string'],
            'Customer_Given_Name' => ['required', 'max:255', 'string'],
            'Customer_Family_Name' => ['required', 'max:255', 'string'],
            'Customer_Contact_Number' => ['required', 'max:255', 'string'],
            'Customer_Email_Address' => ['required', 'max:255', 'string'],
            'Total_Payment' => ['required', 'numeric'],
            'Deposit_Made' => ['required', 'numeric'],
            'Balance_Amount' => ['required', 'numeric'],
            'Balance_Amount_Due' => ['required', 'numeric'],
            'user_id' => ['nullable', 'exists:users,id'],
            'hall_id' => ['required', 'exists:halls,id'],
        ];
    }
}
