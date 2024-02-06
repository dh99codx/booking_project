@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">

                <h3>Account Setting</h3>

                <hr>

                @if($user->status == 1)
                    <form action="{{route('account_activate_deactivate',$user->status)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Deactivate Account</button>
                    </form>
                @else
                    <form action="{{route('account_activate_deactivate',$user->status)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Activate Account</button>
                    </form>
                @endif

                <hr>

                <x-form
                    method="POST"
                    action="{{route('user_profile_store',$user->id)}}"
                    has-files
                    class="mt-4"
                >



                                <div class="row">
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
                                        <div
                                            x-data="imageViewer('')"
                                        >
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
                                        <x-inputs.date
                                            name="dob"
                                            label="Dob"
                                            :value="optional($user->dob)->format('Y-m-d')"
                                            max="255"
                                            required
                                        ></x-inputs.date>
                                    </x-inputs.group>
                                    <x-inputs.group class="col-sm-12">
                                        <x-inputs.email disabled
                                            name="email"
                                            label="Email"
                                            :value="$user->email"
                                            maxlength="255"
                                            placeholder="Emai"
                                        ></x-inputs.email>
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
