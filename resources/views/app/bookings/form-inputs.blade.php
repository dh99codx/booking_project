@php $editing = isset($booking) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.datetime
            name="Check_In"
            label="Check In"
            value="{{ old('Check_In', ($editing ? optional($booking->Check_In)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.datetime
            name="Check_Out"
            label="Check Out"
            value="{{ old('Check_Out', ($editing ? optional($booking->Check_Out)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Booking_Reference_No"
            label="Booking Reference No"
            :value="old('Booking_Reference_No', ($editing ? $booking->Booking_Reference_No : ''))"
            maxlength="255"
            placeholder="Booking Reference No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Customer_Given_Name"
            label="Customer Given Name"
            :value="old('Customer_Given_Name', ($editing ? $booking->Customer_Given_Name : ''))"
            maxlength="255"
            placeholder="Customer Given Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Customer_Family_Name"
            label="Customer Family Name"
            :value="old('Customer_Family_Name', ($editing ? $booking->Customer_Family_Name : ''))"
            maxlength="255"
            placeholder="Customer Family Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Customer_Contact_Number"
            label="Customer Contact Number"
            :value="old('Customer_Contact_Number', ($editing ? $booking->Customer_Contact_Number : ''))"
            maxlength="255"
            placeholder="Customer Contact Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Customer_Email_Address"
            label="Customer Email Address"
            :value="old('Customer_Email_Address', ($editing ? $booking->Customer_Email_Address : ''))"
            maxlength="255"
            placeholder="Customer Email Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="Total_Payment"
            label="Total Payment"
            :value="old('Total_Payment', ($editing ? $booking->Total_Payment : ''))"
            max="255"
            step="0.01"
            placeholder="Total Payment"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="Deposit_Made"
            label="Deposit Made"
            :value="old('Deposit_Made', ($editing ? $booking->Deposit_Made : ''))"
            max="255"
            step="0.01"
            placeholder="Deposit Made"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="Balance_Amount"
            label="Balance Amount"
            :value="old('Balance_Amount', ($editing ? $booking->Balance_Amount : ''))"
            max="255"
            step="0.01"
            placeholder="Balance Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="Balance_Amount_Due"
            label="Balance Amount Due"
            :value="old('Balance_Amount_Due', ($editing ? $booking->Balance_Amount_Due : ''))"
            max="255"
            step="0.01"
            placeholder="Balance Amount Due"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User">
            @php $selected = old('user_id', ($editing ? $booking->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hall_id" label="Hall" required>
            @php $selected = old('hall_id', ($editing ? $booking->hall_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hall</option>
            @foreach($halls as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
