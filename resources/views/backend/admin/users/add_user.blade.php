<x-admin-layout>
    <h1>Add user</h1>
    <div class="custom_form">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
    
            <div class="groups">
                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name')}}">
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="last_name">last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name' )}}">
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username')}}">
                    <span class="inline_alert">{{ $errors->first('username') }}</span>
                </div>
            </div>
    
            <div class="groups">
                <div class="input_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email' )}}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="phone_number">Phone Number</label>
                    <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number')}}">
                    <span class="inline_alert">{{ $errors->first('phone_number') }}</span>
                </div>
    
                
                <div class="input_group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address')}}">
                    <span class="inline_alert">{{ $errors->first('address') }}</span>
                </div>
            </div>
    
            <div class="groups">
                <div class="input_group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="">--select gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others Genders</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('gender') }}</span>
                </div>
            </div>
    
            <div class="group">
                <div class="input_group">
                    <label for="status">Status:-</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="status" id="active" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                            <span>active</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="status" id="inactive" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                            <span>inacitve</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('status') }}</span>
                </div>

                <div class="input_group">
                    <label for="user_level">User Level:-</label>
                    <div class="custom_radio_buttons">
                        {{-- 1: admin, 2:teacher ,3: accountant, 4:student ,5: parent --}}
                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="admin" value="1" {{ old('user_level') == '1' ? 'checked' : '' }}>
                            <span>Admin</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="teacher" value="2" {{ old('user_level') == '2' ? 'checked' : '' }}>
                            <span>teacher</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="accountant" value="3" {{ old('user_level') == '3' ? 'checked' : '' }}>
                            <span>Accountant</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="student" value="4" {{ old('user_level') == '4' ? 'checked' : '' }}>
                            <span>Student</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="parent" value="5" {{ old('user_level') == '5' ? 'checked' : '' }}>
                            <span>Parent</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
                </div>
            </div>
    
            <button type="submit">Add New</button>
        </form>
    </div>
</x-admin-layout>