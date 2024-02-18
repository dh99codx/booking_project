@extends('layouts.app')

@section('content')
<div>
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
                            required
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
                @can('create', App\Models\FamilyDetails::class)
                <a
                    href="{{ route('family_details_customer') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.all_family_details.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.given_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.middle_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.family_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.email_address')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.contact_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.dob')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.relationship')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.gothram')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.rashi')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_family_details.inputs.natchatram')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allFamilyDetails as $familyDetails)
                        <tr>
                            <td>{{ $familyDetails->given_name ?? '-' }}</td>
                            <td>{{ $familyDetails->middle_name ?? '-' }}</td>
                            <td>{{ $familyDetails->family_name ?? '-' }}</td>
                            <td>{{ $familyDetails->email_address ?? '-' }}</td>
                            <td>{{ $familyDetails->contact_number ?? '-' }}</td>
                            <td>{{ $familyDetails->dob ?? '-' }}</td>
                            <td>{{ $familyDetails->relationship ?? '-' }}</td>
                            <td>{{ $familyDetails->gothram ?? '-' }}</td>
                            <td>{{ $familyDetails->rashi ?? '-' }}</td>
                            <td>{{ $familyDetails->natchatram ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $familyDetails)
                                    <a
                                        href="{{ route('edit_family_details', $familyDetails) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan
                                    @can('delete', $familyDetails)
                                    <form
                                        action="{{ route('create_family_details_delete', $familyDetails) }}"
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
                            <td colspan="11">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">
                                {!! $allFamilyDetails->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
