@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('user-profiles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.user_profiles.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.user_profiles.inputs.contact_number_landline')
                    </h5>
                    <span
                        >{{ $userProfile->contact_number_landline ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_profiles.inputs.gothram')</h5>
                    <span>{{ $userProfile->gothram ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_profiles.inputs.rashi')</h5>
                    <span>{{ $userProfile->rashi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_profiles.inputs.natchatram')</h5>
                    <span>{{ $userProfile->natchatram ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_profiles.inputs.profile_picture')</h5>
                    <x-partials.thumbnail
                        src="{{ $userProfile->profile_picture ? \Storage::url($userProfile->profile_picture) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('user-profiles.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\UserProfile::class)
                <a
                    href="{{ route('user-profiles.create') }}"
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
