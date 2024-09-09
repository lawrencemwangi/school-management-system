<x-app-layout>
    <div class= "auth">
        <div class="custom_form">
            <h1>Login</h1>
    
            <form action="{{ route('login') }}" method="post">
                @csrf
    
                <div class="input_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="user@gmail.com or username" value="{{ old('email') }}">
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="*****" value="{{ old('password') }}">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>

                <p>Don't have account? <a href="{{ route('register') }}">Register</a></p>
                <p><a href="{{ route('password.request') }}">Forgot Password?</a></p>
    
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>
</x-app-layout>
