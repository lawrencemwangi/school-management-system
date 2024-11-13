<x-admin-layout>
    <div class="class_container">
        <h1>Update Class Detials</h1>

        <div class="custom_form">
            <form action="{{ route('dorms.update', ['dorm' => $dorm]) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="groups">
                    <div class="input_group">
                        <label for="dorm_name"> Class Name</label>
                        <input type="text" name="dorm_name" id="dorm_name" value="{{ old('dorm_name', $dorm->dorm_name]) }}">
                        <span class="inlien_alert">{{ $error->first('dorm_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="dorm_capacity"> Class Name</label>
                        <input type="text" name="dorm_capacity" id="dorm_capacity" value="{{ old('dorm_capacity', $dorm->dorm_capacity) }}">
                        <span class="inlien_alert">{{ $error->first('dorm_capacity') }}</span>
                    </div>
                </div>

                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-admin-layout>