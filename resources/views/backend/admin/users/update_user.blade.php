<x-admin-layout>
    <h1>Update Users</h1>

    <div class="custom_form">
        <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="groups">
                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name )}}">
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name )}}">
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $user->username )}}">
                    <span class="inline_alert">{{ $errors->first('username') }}</span>
                </div>
            </div>

            <div class="groups">
                <div class="input_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email )}}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_number">Phone Number</label>
                    <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number )}}">
                    <span class="inline_alert">{{ $errors->first('phone_number') }}</span>
                </div>

                
                <div class="input_group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $user->address )}}">
                    <span class="inline_alert">{{ $errors->first('address') }}</span>
                </div>
            </div>

            <div class="groups">
                <div class="input_group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="">--select gender--</option>
                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="others" {{ $user->gender == 'others' ? 'selected' : '' }}>Others Genders</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('gender') }}</span>
                </div>
            </div>

            <div class="group">
                <div class="input_group">
                    <label for="status">Status:-</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="status" id="active" value="1" {{ old('status', $user->status) == '1' ? 'checked' : '' }}>
                            <span>Active</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="status" id="inactive" value="0" {{ old('status', $user->status) == '0' ? 'checked' : '' }}>
                            <span>Inacitve</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('status') }}</span>
                </div>

                <div class="input_group">
                    <label for="user_level">User Level:-</label>
                    <div class="custom_radio_buttons">
                        {{-- 1: admin, 2:teacher ,3: accountant, 4:student ,5: parent --}}
                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="admin" value="1" {{ old('user_level', $user->user_level) == '1' ? 'checked' : '' }}>
                            <span>Admin</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="teacher" value="2" {{ old('user_level', $user->user_level) == '2' ? 'checked' : '' }}>
                            <span>Teacher</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="accountant" value="3" {{ old('user_level', $user->user_level) == '3' ? 'checked' : '' }}>
                            <span>Accountant</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="student" value="4" {{ old('user_level', $user->user_level) == '4' ? 'checked' : '' }}>
                            <span>Student</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="parent" value="5" {{ old('user_level', $user->user_level) == '5' ? 'checked' : '' }}>
                            <span>Parent</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
                </div>
                <details>
                    <summary>details</summary>
                    Hello Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem magni voluptatem tenetur recusandae ea saepe debitis placeat sed architecto repellendus.
                </details>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</x-admin-layout>