<x-app-layout>
    <div class="forgotpassword_container custom_form auth">
        <h1>Forgot Password</h1>

        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset link that will allow you to choose a new one.
            </p>

            <div class="input_group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter you Email to recieve the link">
                <span class="inline_alert">{{  $errors->first('email') }}</span>
            </div>
            <button type="submit">Email Password Reset Link</button>
        </form>
    </div>



    {{-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-app-layout>
