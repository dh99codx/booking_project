@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bookings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.bookings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Check_In')</h5>
                    <span>{{ $booking->Check_In ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Check_Out')</h5>
                    <span>{{ $booking->Check_Out ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Booking_Reference_No')</h5>
                    <span>{{ $booking->Booking_Reference_No ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Customer_Given_Name')</h5>
                    <span>{{ $booking->Customer_Given_Name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Customer_Family_Name')</h5>
                    <span>{{ $booking->Customer_Family_Name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.bookings.inputs.Customer_Contact_Number')
                    </h5>
                    <span>{{ $booking->Customer_Contact_Number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.bookings.inputs.Customer_Email_Address')
                    </h5>
                    <span>{{ $booking->Customer_Email_Address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Total_Payment')</h5>
                    <span>{{ $booking->Total_Payment ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Deposit_Made')</h5>
                    <span>{{ $booking->Deposit_Made ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Balance_Amount')</h5>
                    <span>{{ $booking->Balance_Amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.Balance_Amount_Due')</h5>
                    <span>{{ $booking->Balance_Amount_Due ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.user_id')</h5>
                    <span
                        >{{ optional($booking->user)->given_name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bookings.inputs.hall_id')</h5>
                    <span>{{ optional($booking->hall)->Name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('bookings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Booking::class)
                <a href="{{ route('bookings.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
