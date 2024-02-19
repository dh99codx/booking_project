@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('halls.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.halls.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.halls.inputs.Name')</h5>
                    <span>{{ $hall->Name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.halls.inputs.Price')</h5>
                    <span>{{ $hall->Price ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('halls.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Hall::class)
                <a href="{{ route('halls.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
