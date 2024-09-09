<x-app-layout>
    <div class="auth">
        <div class="custom_form">
            <h1>Register</h1>

            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="input_group">
                    <label for="first_name">First Name</label><span>*</span>
                    <input type="text" name="first_name" id="first_name" placeholder="john" value="{{ old('first_name') }}" required>
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label> <span>*</span>
                    <input type="text" name="last_name" id="last_name" placeholder="Mwangi" value="{{ old('last_name') }}" required>
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="username">User Name</label> <span>*</span>
                    <input type="text" name="username" id="username" placeholder="Mwangi" value="{{ old('username') }}" required>
                    <span class="inline_alert">{{ $errors->first('username') }}</span>
                </div>
                
                <div class="input_group">
                    <label for="email">Email</label><span>*</span>
                    <input type="email" name="email" id="email" placeholder="user@gmail.com" value="{{ old('email') }}" required>
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>

                <div class="input_group">
                    <label for="dob">Date of Birth</label><span>*</span>
                    <input type="date" name="dob" id="dob" placeholder="2/7/2002" value="{{ old('dob') }}" required>
                    <span class="inline_alert">{{ $errors->first('dob') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_number">Phone Number(Main)</label><span>*</span>
                    <input type="number" name="phone_number" id="phone_number" placeholder="0712345678" value="{{ old('phone_number') }}" required>
                    <span class="inline_alert">{{ $errors->first('phone_number') }}</span>
                </div>

                <div class="input_group">
                    <label for="other_phone">Other Phone number(Main)</label>
                    <input type="number" name="other_phone" id="other_phone" placeholder="0712345678" value="{{ old('other_phone') }}">
                    <span class="inline_alert">{{ $errors->first('other_phone') }}</span>
                </div>

                <div class="input_group">
                    <label for="address">Address</label>
                    <input type="address" name="address" id="address" placeholder="kirigiti, kiambu" value="{{ old('address') }}">
                    <span class="inline_alert">{{ $errors->first('address') }}</span>
                </div>

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
                
                <div class="input_group">
                    <label for="image">Profile Picture (<strong>max:2mbs</strong>)</label>
                    <input type="file" name="image" id="image" accept="image/*" value="{{ old('image') }}">
                    <span class="inline_alert">{{ $errors->first('image') }}</span>
                </div>

                <div class="input_group">
                    <label for="password">Password </label><span>*</span>
                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="*****" required>
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="password_confirmation">Confirmation password</label><span>*</span>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}"   placeholder="*****" required>
                    <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span>
                </div>

                <p>Aleady have account? <a href="{{  route('login')}}">Login</a></p>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</x-app-layout>
