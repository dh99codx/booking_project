@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Booking::class)
                <a
                    href="{{ route('bookings.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create') Booking
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.bookings.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Check_In')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Check_Out')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Booking_Reference_No')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Customer_Given_Name')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Customer_Family_Name')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Customer_Contact_Number')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.Customer_Email_Address')
                            </th>
                            <th class="text-right">
                                @lang('crud.bookings.inputs.Total_Payment')
                            </th>
                            <th class="text-right">
                                @lang('crud.bookings.inputs.Deposit_Made')
                            </th>
                            <th class="text-right">
                                @lang('crud.bookings.inputs.Balance_Amount')
                            </th>
                            <th class="text-right">
                                @lang('crud.bookings.inputs.Balance_Amount_Due')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.bookings.inputs.hall_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->Check_In ?? '-' }}</td>
                            <td>{{ $booking->Check_Out ?? '-' }}</td>
                            <td>{{ $booking->Booking_Reference_No ?? '-' }}</td>
                            <td>{{ $booking->Customer_Given_Name ?? '-' }}</td>
                            <td>{{ $booking->Customer_Family_Name ?? '-' }}</td>
                            <td>
                                {{ $booking->Customer_Contact_Number ?? '-' }}
                            </td>
                            <td>
                                {{ $booking->Customer_Email_Address ?? '-' }}
                            </td>
                            <td>{{ $booking->Total_Payment ?? '-' }}</td>
                            <td>{{ $booking->Deposit_Made ?? '-' }}</td>
                            <td>{{ $booking->Balance_Amount ?? '-' }}</td>
                            <td>{{ $booking->Balance_Amount_Due ?? '-' }}</td>
                            <td>
                                {{ optional($booking->user)->given_name ?? '-'
                                }}
                            </td>
                            <td>{{ optional($booking->hall)->Name ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $booking)
                                    <a
                                        href="{{ route('bookings.edit', $booking) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $booking)
                                    <a
                                        href="{{ route('bookings.show', $booking) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $booking)
                                    <form
                                        action="{{ route('bookings.destroy', $booking) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="14">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="14">{!! $bookings->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="container-fluid">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Hall::class)
                    <a href="{{ route('halls.create') }}" class="btn btn-primary">
                        <i class="icon ion-md-add"></i> @lang('crud.common.create') Hall
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.halls.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th class="text-left">
                            @lang('crud.halls.inputs.Name')
                        </th>
                        <th class="text-left">
                            @lang('crud.halls.inputs.Price')
                        </th>
                        <th class="text-center">
                            @lang('crud.common.actions')
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($halls as $hall)
                        <tr>
                            <td>{{ $hall->Name ?? '-' }}</td>
                            <td>{{ $hall->Price ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $hall)
                                        <a href="{{ route('halls.edit', $hall) }}">
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        </a>
                                    @endcan @can('view', $hall)
                                        <a href="{{ route('halls.show', $hall) }}">
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                    @endcan @can('delete', $hall)
                                        <form
                                            action="{{ route('halls.destroy', $hall) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-light text-danger"
                                            >
                                                <i class="icon ion-md-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3">{!! $halls->render() !!}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>








@endsection
