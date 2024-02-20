@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">

                <h3>Account Setting</h3>

                <hr>

                <form>
                    <a
                        class="btn btn-light text-danger"
                        data-target="#deleteModal_{{$user->id}}"
                        data-toggle="modal"
                    >
                        <i class="ion ion-md-alert"></i> Deactivate Account
                    </a>
                </form>

                <div class="modal fade" id="deleteModal_{{$user->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Are you sure you want to deactivate account? </p>
                                <p>
                                    Data Backup: Before deleting your account, consider backing up any important data or information associated with your account that you may want to retain.
                                </p>
                                <p>
                                    Irreversible Action: Deleting your account is typically irreversible. Ensure that you are certain about your decision before proceeding.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">No</button>
                                <form
                                    action="{{ route('account_activate_deactivate', $user->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deactivate Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>

                <x-form
                    onsubmit="return confirm('{{ __('crud.common.are_you_sure_update') }}')"
                    method="PUT"
                    action="{{route('user_profile_update',$userProfile->id)}}"
                    has-files
                    class="mt-4">

                                @php $editing = isset($userProfile) @endphp

                                <div class="row">


                                    {{--given name--}}
                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="given_name"
                                            label="Given Name"
                                            :value="$user->given_name"
                                            maxlength="255"
                                            placeholder="Given Name"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="middle_name"
                                            label="Middle Name"
                                            :value="$user->middle_name"
                                            maxlength="255"
                                            placeholder="Middle Name"
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="family_name"
                                            label="Family Name"
                                            :value="$user->family_name"
                                            maxlength="255"
                                            placeholder="Family Name"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="address"
                                            label="Address"
                                            :value="$user->address"
                                            maxlength="255"
                                            placeholder="Address"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="mobile_number"
                                            label="Mobile Number"
                                            :value="$user->mobile_number"
                                            maxlength="255"
                                            placeholder="Mobile Number"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>



                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="contact_number_landline"
                                            label="Contact Number Landline"
                                            :value="old('contact_number_landline', ($editing ? $userProfile->contact_number_landline : ''))"
                                            maxlength="255"
                                            placeholder="Contact Number Landline"
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="email"
                                            label="Email"
                                            :value="old('email', ($editing ? $user->email : ''))"
                                            maxlength="255"
                                            placeholder="Email"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>

                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.password
                                            name="password"
                                            label="password"
                                            maxlength="255"
                                            placeholder="Password"
                                        ></x-inputs.password>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.password
                                            name="confirm_password"
                                            label="password"
                                            maxlength="255"
                                            placeholder="Confirm Password"
                                        ></x-inputs.password>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.date
                                            name="dob"
                                            label="DOB"
                                            :value="optional($user->dob)->format('Y-m-d')"
                                            max="255"
                                            required
                                        ></x-inputs.date>
                                    </x-inputs.group>



                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="gothram"
                                            label="Gothram"
                                            :value="old('gothram', ($editing ? $userProfile->gothram : ''))"
                                            maxlength="255"
                                            placeholder="Gothram">
                                        </x-inputs.text>
                                    </x-inputs.group>

                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="rashi"
                                            label="Rashi"
                                            :value="old('rashi', ($editing ? $userProfile->rashi : ''))"
                                            maxlength="255"
                                            placeholder="Rashi">
                                        </x-inputs.text>
                                    </x-inputs.group>

                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="natchatram"
                                            label="Natchatram"
                                            :value="old('natchatram', ($editing ? $userProfile->natchatram : ''))"
                                            maxlength="255"
                                            placeholder="Natchatram">
                                        </x-inputs.text>
                                    </x-inputs.group>

                                    <x-inputs.group class="col-sm-12">
                                        <div
                                            x-data="imageViewer('{{ $editing && $userProfile->profile_picture ? \Storage::url($userProfile->profile_picture) : '' }}')"
                                        >
                                            <div class="row">


                                                <div class="mt-5 mr-3">
                                                    <x-inputs.partials.label
                                                        name="profile_picture"
                                                        label="Profile Picture"
                                                    ></x-inputs.partials.label
                                                    ><br />
                                                </div>




                                                <div>
                                                    <!-- Show the image -->
                                                    <template x-if="imageUrl">
                                                        <img
                                                            :src="imageUrl"
                                                            class="object-cover rounded border border-gray-200"
                                                            style="width: 100px; height: 100px;"
                                                        />
                                                    </template>

                                                    <!-- Show the gray box when image is not available -->
                                                    <template x-if="!imageUrl">
                                                        <div
                                                            class="border rounded border-gray-200 bg-gray-100"
                                                            style="width: 100px; height: 100px;"
                                                        ></div>
                                                    </template>

                                                    <div class="mt-2">
                                                        <input
                                                            type="file"
                                                            name="profile_picture"
                                                            id="profile_picture"
                                                            @change="fileChosen"
                                                        />
                                                    </div>
                                                </div>



                                            </div>


                                            @error('profile_picture')
                                            @include('components.inputs.partials.error') @enderror
                                        </div>
                                    </x-inputs.group>


                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="icon ion-md-save"></i>
                                        @lang('crud.common.update')
                                    </button>
                                </div>
                            </x-form>
            </div>
        </div>
    </div>
@endsection
