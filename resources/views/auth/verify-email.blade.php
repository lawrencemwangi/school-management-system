<x-app-layout>
    <div class="verify_container custo_form auth">
        <h3>Email verification</h3>
        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just 
            emailed to you? If you didn\'t receive the email, we will gladly send you another.
        </p>

        <form action="{{ route('verification.send') }}" method="post">
            @csrf

            <button type="submit">Resend Verification Email</button>
        </form>

        <form action="{{ route('logout') }}" method="post">
            @csrf

            <button type="submit">Logout</button>
        </form>
    </div>
</x-app-layout>
