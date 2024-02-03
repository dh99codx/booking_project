@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">

            <x-form
                method="PUT"
                action="{{ route('user_profile_update', $userProfile) }}"
                has-files
                class="mt-4"
            >

                @php $editing = isset($userProfile) @endphp

                <div class="row">
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="contact_number_landline"
                            label="Contact Number Landline"
                            :value="old('contact_number_landline', ($editing ? $userProfile->contact_number_landline : ''))"
                            maxlength="255"
                            placeholder="Contact Number Landline"
                            required
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <div
                            x-data="imageViewer('{{ $editing && $userProfile->profile_picture ? \Storage::url($userProfile->profile_picture) : '' }}')"
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
                            :value="old('gothram', ($editing ? $userProfile->gothram : ''))"
                            maxlength="255"
                            placeholder="Gothram"
                            required
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select name="user_id" label="User" required>
                            @php $selected = old('user_id', ($editing ? $userProfile->user_id : '')) @endphp
                            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                            @foreach($users as $value => $label)
                                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="rashi"
                            label="Rashi"
                            :value="old('rashi', ($editing ? $userProfile->rashi : ''))"
                            maxlength="255"
                            placeholder="Rashi"
                            required
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="natchatram"
                            label="Natchatram"
                            :value="old('natchatram', ($editing ? $userProfile->natchatram : ''))"
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
