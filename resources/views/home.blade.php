<x-app-layout>
    @include('partials.navbar')

    <h1>Hello world</h1>
    {{-- Welcome so much we missed you  <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong> --}}
    <p>Welcome to the school management System created using <strong> Laravel 11</strong></p>
</x-app-layout>
