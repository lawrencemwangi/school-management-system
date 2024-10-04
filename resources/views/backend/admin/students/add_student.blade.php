<x-admin-layout>
    <h1>Add Student</h1>

    <div class="custom_form">
        <form action="#" method="post">
            @csrf

            <div class="groups">
                <div class="input_group">
                    <label for="User_id">User</label>
                    <select name="user_id" id="user_id">
                        <option value="">--Select a user--</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{  old('user_id') == $user ? 'selected' : '' }}>{{  $user->first_name }} {{  $user->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input_group">
                    <label for="parent_id">Parents</label>
                    <select name="parent_id" id="parent_id">
                        <option value="">--Select a parent--</option>
                        @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" {{  old('parent_id') == $parent ? 'selected' : '' }}>
                            {{  $parent->user->first_name }} {{  $parent->user->last_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input_group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number' )}}">
                    <span class="inline_alert">{{ $errors->first('registration_number') }}</span>
                </div>
            </div>

            <div class="groups">
                <div class="input_group">
                    <label for="year_admitted">Year Admitted </label>
                    <input type="date" name="year_admitted" id="year_admitted" value="{{ old('year_admitted' )}}">
                    <span class="inline_alert">{{ $errors->first('year_admitted') }}</span>
                </div>

                <div class="input_group">
                    <label for="dorm_room_number">Graduation Date</label>
                    <input type="date" name="dorm_room_number" id="dorm_room_number" value="{{ old('dorm_room_number' )}}">
                    <span class="inline_alert">{{ $errors->first('dorm_room_number') }}</span>
                </div>
                
                <div class="input_group">
                    <label for="class_id">Classes</label>
                    <select name="class_id" id="class_id">
                        <option value="">--Select class--</option>
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{  old('class_id') == $class ? 'selected' : '' }}>
                            {{  $class->class_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="group">
                
                <div class="input_group">
                    <label for="dorm_id">Dorm</label>
                    <select name="dorm_id" id="dorm_id">
                        <option value="">--Select class--</option>
                        @foreach ($dorms as $dorm)
                        <option value="{{ $dorm->id }}" {{  old('dorm_id') == $dorm ? 'selected' : '' }}>
                            {{  $dorm->dorm_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input_group">
                    <label for="status">Status:-</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="status" id="active" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                            <span>Graduate</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="status" id="inactive" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                            <span>Udergraduate</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('status') }}</span>
                </div>
            </div>

            <button type="submit">Add New</button>
        </form>
    </div>
</x-admin-layout>