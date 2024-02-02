@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">

                <a href="{{ route('manage-account-create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.manage.name')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                Role
                            </th>
                            <th class="text-center">
                                User and email
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($model_has_roles as $data)
                        <tr>
                            <td>
                                {{Role_name($data->role_id)}}
                            </td>
                            <td>
                                {{User_name_and_email($data->model_id)}}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                        @can('delete', $data)
                                    <form
                                        action="{{route('manage-account-delete')}}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" name="model_id" value="{{$data->model_id}}">

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
                            <td colspan="2">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
