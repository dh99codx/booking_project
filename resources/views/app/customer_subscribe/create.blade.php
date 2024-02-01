@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('subscribers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Subscribe to newsletters
            </h4>


            @if($message=Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif

            <x-form
                method="POST"
                action="{{ route('customer_subscriber_store') }}"
                class="mt-4"
            >
                @include('app.customer_subscribe.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('subscribers.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        Subscribe to newsletters
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
