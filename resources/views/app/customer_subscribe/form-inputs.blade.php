@php $editing = isset($subscriber) @endphp

<div class="row">

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="subscriber_type_id"
            label="Subscriber Type"
            required
        >
            @php $selected = old('subscriber_type_id', ($editing ? $subscriber->subscriber_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Subscriber Type</option>
            @foreach($subscriberTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

{{--    <x-inputs.group class="col-sm-12">--}}
{{--        <x-inputs.select name="frequency_id" label="Frequency" required>--}}
{{--            @php $selected = old('frequency_id', ($editing ? $subscriber->frequency_id : '')) @endphp--}}
{{--            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Frequency</option>--}}
{{--            @foreach($frequencies as $value => $label)--}}
{{--            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>--}}
{{--            @endforeach--}}
{{--        </x-inputs.select>--}}
{{--    </x-inputs.group>--}}
</div>
