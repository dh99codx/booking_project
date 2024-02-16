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

{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <strong>--}}
{{--                            Mobile Number--}}
{{--                        </strong>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{route('mobile_number_reset')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            {{csrf_field()}}--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" value="{{$user->mobile_number}}" class="form-control" name="mobile_number_reset"  placeholder="Mobile Number">--}}
{{--                            </div>--}}
{{--                            <p class="card-text">A text message will be sent for verification during password reset </p>--}}
{{--                            <button type="submit" class="btn btn-dark">Reset Phone Number</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <x-form
                    method="POST"
                    action="{{route('user_profile_store',$user->id)}}"
                    has-files
                    class="mt-4"
                >



                                <div class="row">

                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="given_name"
                                            label="Given Name"
                                            maxlength="255"
                                            :value="$user->given_name"
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
                                            required
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
                                            maxlength="255"
                                            placeholder="Contact Number Landline"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="email"
                                            label="Email"
                                            :value="$user->email"
                                            maxlength="255"
                                            placeholder="Email"
                                            required
                                        ></x-inputs.text>
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
                                            maxlength="255"
                                            placeholder="Gothram"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>



                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="rashi"
                                            label="Rashi"
                                            maxlength="255"
                                            placeholder="Rashi"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.text
                                            name="natchatram"
                                            label="Natchatram"
                                            maxlength="255"
                                            placeholder="Natchatram"
                                            required
                                        ></x-inputs.text>
                                    </x-inputs.group>


                                    <x-inputs.group class="col-sm-12">
                                        <div x-data="imageViewer('')">
                                            <x-inputs.partials.label
                                                name="profile_picture"
                                                label="Profile Picture"
                                            ></x-inputs.partials.label
                                            ><br />

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

                                            @error('profile_picture')
                                            @include('components.inputs.partials.error') @enderror
                                        </div>
                                    </x-inputs.group>





                                </div>


                                <div class="mt-4">
                                    <button type="submit" class="btn btn-dark float-right">
                                        <i class="icon ion-md-save"></i>
                                        @lang('crud.common.update')
                                    </button>
                                </div>
                            </x-form>
            </div>
        </div>
    </div>
@endsection
