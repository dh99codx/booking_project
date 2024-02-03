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
</div>
