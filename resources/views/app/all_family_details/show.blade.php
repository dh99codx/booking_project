@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-family-details.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_family_details.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.given_name')</h5>
                    <span>{{ $familyDetails->given_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.middle_name')</h5>
                    <span>{{ $familyDetails->middle_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.family_name')</h5>
                    <span>{{ $familyDetails->family_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_family_details.inputs.email_address')
                    </h5>
                    <span>{{ $familyDetails->email_address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_family_details.inputs.contact_number')
                    </h5>
                    <span>{{ $familyDetails->contact_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.dob')</h5>
                    <span>{{ $familyDetails->dob ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_family_details.inputs.relationship')
                    </h5>
                    <span>{{ $familyDetails->relationship ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.gothram')</h5>
                    <span>{{ $familyDetails->gothram ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.rashi')</h5>
                    <span>{{ $familyDetails->rashi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_family_details.inputs.natchatram')</h5>
                    <span>{{ $familyDetails->natchatram ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-family-details.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\FamilyDetails::class)
                <a
                    href="{{ route('all-family-details.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
