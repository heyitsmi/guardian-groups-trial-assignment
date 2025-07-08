<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-teal-gradient min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-card max-w-4xl mx-auto overflow-hidden">
                <!-- Header -->
                <x-header/>
    
                <!-- Content Grid -->
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
    </body>
</html>