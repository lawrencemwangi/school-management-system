<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image" href="{{ asset('/assets/images/logo.jpg') }}">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/stlye.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="dashboard_container">
            @include('backend.partials.asidenav')

            <div class="dashboard_content">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
    
    @include('partials.messages')
    @include('partials.javascript')    
</html>
