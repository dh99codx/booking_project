@php $editing = isset($frequency) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $frequency->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="days"
            label="Days"
            :value="old('days', ($editing ? $frequency->days : ''))"
            max="255"
            placeholder="Days"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
