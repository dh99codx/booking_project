<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="user_id"
            label="User Type"
            required
        >
            <option value="">Please select the User</option>
            @foreach($users as $data)
                <option value="{{ $data->id }}" >{{ $data->given_name }} ({{$data->email}})</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="role_id"
            label="Role Type"
            required
        >
            <option value="">Please select the Role Type</option>
            @foreach($roles as $data)
                <option value="{{ $data->id }}" >{{ $data->name }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

