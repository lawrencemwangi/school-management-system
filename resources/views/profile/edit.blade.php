<x-app-layout>
    @include('partials.navbar')
    <div class="profile_container container">
        <h1>Profile Information</h1>

        <div class="Profile_infor custom_form">
            <h3>User Details</h3>

            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('patch')

                <div class="groups">
                    <div class="input_group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                        <span class="inline_alert">{{  $errors->first('first_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                        <span class="inline_alert">{{  $errors->first('last_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}">
                        <span class="inline_alert">{{  $errors->first('username') }}</span>
                    </div>
                </div>

                <div class="groups">
                    <div class="input_group">
                        <label for="email">Username</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
                        <span class="inline_alert">{{  $errors->first('email') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="phone_number">Username</label>
                        <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                        <span class="inline_alert">{{  $errors->first('phone_number') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="{{ old('dob', $user->dob) }}">
                        <span class="inline_alert">{{  $errors->first('dob') }}</span>
                    </div>
                </div>

                <button type="submit">Update</button>
            </form>
        </div>

        <div class="password_container custom_form">
            <h3>Update Password</h3>

            <form action="{{ route('password.update') }}" method="post">
                @csrf
                @method('put')

                <div class="groups">
                    <div class="input_group">
                        <label for="update_password_current_password">Current Password</label>
                        <input type="password" name="current_password" id="update_password_current_password" placeholder="Current password">
                        <span class="inline_alert">{{  $errors->first('current_password') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="update_password_password">New Password</label>
                        <input type="password" name="password" id="update_password_password"  placeholder="New password">
                        <span class="inline_alert">{{  $errors->first('password') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="update_password_password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="update_password_password_confirmation"  placeholder="Confirm password">
                        <span class="inline_alert">{{  $errors->first('password_confirmation') }}</span>
                    </div>
                </div>
                <button type="submit">Updated Password</button>
            </form>
        </div>

        
        <div class="profile_delete">
            <h1>Delete Account</h1>

            <form  action="{{ route('profile.destroy') }}" method="post" id="deleteForm">
                @csrf
                @method('delete')

                <p>if you want to delete you account enter the password. We will miss you our client and hope to see you back soon !!</p>
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
                <span class="inline_alert">{{ $errors->first('password') }}</span>

                <button type="submit" id="deleteButton"  style="display: none;" class="alert-danger">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>
