@php $editing = isset($familyDetails) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="given_name"
            label="Given Name"
            :value="old('given_name', ($editing ? $familyDetails->given_name : ''))"
            maxlength="255"
            placeholder="Given Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="middle_name"
            label="Middle Name"
            :value="old('middle_name', ($editing ? $familyDetails->middle_name : ''))"
            maxlength="255"
            placeholder="Middle Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="family_name"
            label="Family Name"
            :value="old('family_name', ($editing ? $familyDetails->family_name : ''))"
            maxlength="255"
            placeholder="Family Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="email_address"
            label="Email Address"
            :value="old('email_address', ($editing ? $familyDetails->email_address : ''))"
            maxlength="255"
            placeholder="Email Address"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="contact_number"
            label="Contact Number"
            :value="old('contact_number', ($editing ? $familyDetails->contact_number : ''))"
            maxlength="255"
            placeholder="Contact Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="dob"
            label="Dob"
            value="{{ old('dob', ($editing ? optional($familyDetails->dob)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="relationship"
            label="Relationship"
            :value="old('relationship', ($editing ? $familyDetails->relationship : ''))"
            maxlength="255"
            placeholder="Relationship"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="gothram"
            label="Gothram"
            :value="old('gothram', ($editing ? $familyDetails->gothram : ''))"
            maxlength="255"
            placeholder="Gothram"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="rashi"
            label="Rashi"
            :value="old('rashi', ($editing ? $familyDetails->rashi : ''))"
            maxlength="255"
            placeholder="Rashi"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="natchatram"
            label="Natchatram"
            :value="old('natchatram', ($editing ? $familyDetails->natchatram : ''))"
            maxlength="255"
            placeholder="Natchatram"
        ></x-inputs.text>
    </x-inputs.group>
</div>
