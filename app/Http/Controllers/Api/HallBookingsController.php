<?php

namespace App\Http\Controllers\Api;

use App\Models\Hall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Resources\BookingCollection;

class HallBookingsController extends Controller
{
    public function index(Request $request, Hall $hall): BookingCollection
    {
        $this->authorize('view', $hall);

        $search = $request->get('search', '');

        $bookings = $hall
            ->bookings()
            ->search($search)
            ->latest()
            ->paginate();

        return new BookingCollection($bookings);
    }

    public function store(Request $request, Hall $hall): BookingResource
    {
        $this->authorize('create', Booking::class);

        $validated = $request->validate([
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
        ]);

        $booking = $hall->bookings()->create($validated);

        return new BookingResource($booking);
    }
}
