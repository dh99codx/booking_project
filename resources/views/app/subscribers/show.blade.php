@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('subscribers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.subscribers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.subscribers.inputs.token')</h5>
                    <span>{{ $subscriber->token ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.subscribers.inputs.status')</h5>
                    <span>{{ $subscriber->status ?? '' }}{{$subscriber->status ? '' : 0}}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.subscribers.inputs.email')</h5>
                    <span>{{ $subscriber->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.subscribers.inputs.subscriber_type_id')</h5>
                    <span
                        >{{ optional($subscriber->subscriberType)->name ?? '-'
                        }}</span
                    >
                </div>
{{--                <div class="mb-4">--}}
{{--                    <h5>@lang('crud.subscribers.inputs.frequency_id')</h5>--}}
{{--                    <span--}}
{{--                        >{{ optional($subscriber->frequency)->name ?? '-'--}}
{{--                        }}</span--}}
{{--                    >--}}
{{--                </div>--}}
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('subscribers.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
