<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="h-screen font-sans antialiased bg-white dark:bg-gray-900">

    @include('layouts.navigation')

    {{ $slot }}

    @if (request()->routeIs('home')) {{-- Check if the current route is the home page --}}
    @livewire('home-projects')
    @endif

    @include('layouts.footer')

    @livewireScripts
    </body>
</html>
