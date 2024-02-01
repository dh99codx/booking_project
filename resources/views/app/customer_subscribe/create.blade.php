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


            <x-form
                method="POST"
                action="{{ route('customer_subscriber_store') }}"
                class="mt-4"
            >
                @include('app.customer_subscribe.form-inputs')

                <div class="mt-4">

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        Subscribe to newsletters
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('subscribers.index') }}" class="mr-4"
                ><i class="icon ion-md-arrow-back"></i
                    ></a>
                Unsubscribe Newsletters
            </h4>
            <br>
            @foreach($subscribers as $data)
                <form
                    action="{{ route('subscribers.destroy', $data) }}"
                    method="POST"
                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                >
                    <br>
                    @csrf @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-light text-danger d-inline-block"
                    >
                        {{$data->subscriberType->name}}
                        <i class="icon ion-md-trash"></i>
                    </button>
                </form>
            @endforeach
        </div>
    </div>
</div>



@endsection
