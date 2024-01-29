@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('users.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.users.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.name')</h5>
                    <span>{{ $user->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.family_name')</h5>
                    <span>{{ $user->family_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.dob')</h5>
                    <span>{{ $user->dob ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.address')</h5>
                    <span>{{ $user->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.mobile_number')</h5>
                    <span>{{ $user->mobile_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.email')</h5>
                    <span>{{ $user->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.news_letter_subscription')</h5>
                    <span>{{ $user->news_letter_subscription ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.users.inputs.privacy_policy_and_terms_of_condition')
                    </h5>
                    <span
                        >{{ $user->privacy_policy_and_terms_of_condition ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.roles.name')</h5>
                    <div>
                        @forelse ($user->roles as $role)
                        <div class="badge badge-primary">{{ $role->name }}</div>
                        <br />
                        @empty - @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\User::class)
                <a href="{{ route('users.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
