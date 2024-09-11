<x-app-layout>
    <div class="passwordreset_contianer custom_form auth">
        <h1>Reset Password</h1>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
    
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
            <div class="input_group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}">
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>
    
            <div class="group">
                <div class="input_group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password"  placeholder="Enter the new strong password">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>
    
                <div class="input_group">
                    <label for="password_confirmation">Confrim Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confrim the strong password">
                    <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span>
                </div>
            </div>
    
            <button type="submit">Reset Password</button>
        </form>
    </div>
</x-app-layout>
