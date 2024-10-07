<x-admin-layout>
    <h1>Add Dorm</h1>

    <div class="custom_form">
        <form action="{{ route('dorms.store') }}" method="post">
            @csrf

            <div class="group">
                <div class="input_group">
                    <label for="dorm_name">Dorm Name</label>
                    <input type="text" name="dorm_name" id="dorm_name" value="{{ old('dorm_name') }}" placeholder="Aplha">
                    <span class="inline_alert">{{ $errors->first('dorm_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="dorm_capacity">Dorm Capacity</label>
                    <input type="text" name="dorm_capacity" id="dorm_capacity" value="{{ old('dorm_capacity') }}"  placeholder="20 students">
                    <span class="inline_alert">{{ $errors->first('dorm_capacity') }}</span>
                </div>
            </div>

            <button type="submit">Add New</button>
        </form>
    </div>
</x-admin-layout>