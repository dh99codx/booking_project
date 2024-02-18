@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="given_name"
            label="Given Name"
            :value="old('given_name', ($editing ? $user->given_name : ''))"
            maxlength="255"
            placeholder="Given Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="middle_name"
            label="Middle Name"
            :value="old('middle_name', ($editing ? $user->middle_name : ''))"
            maxlength="255"
            placeholder="Middle Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="family_name"
            label="Family Name"
            :value="old('family_name', ($editing ? $user->family_name : ''))"
            maxlength="255"
            placeholder="Family Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="dob"
            label="Dob"
            value="{{ old('dob', ($editing ? optional($user->dob)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $user->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="mobile_number"
            label="Mobile Number"
            :value="old('mobile_number', ($editing ? $user->mobile_number : ''))"
            maxlength="255"
            placeholder="Mobile Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="news_letter_subscription"
            label="News Letter Subscription"
            :checked="old('news_letter_subscription', ($editing ? $user->news_letter_subscription : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="privacy_policy_and_terms_of_condition"
            label="Privacy Policy And Terms Of Condition"
            :checked="old('privacy_policy_and_terms_of_condition', ($editing ? $user->privacy_policy_and_terms_of_condition : 0))"
            required
        ></x-inputs.checkbox>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
