<x-app-layout>
    <div class="main_container school">
        <h1>Account Inactive</h1>
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        <p>Your Account has been disabled, contact the admin for further assistance.</p>
        <button><a href="{{ route('contact') }}" >Contact Admin</a></button>
    </div>
</x-app-layout>