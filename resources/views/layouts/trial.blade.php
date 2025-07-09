<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trial Assignment - {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('styles')
</head>
<body class="font-sans antialiased bg-light-gray-bg">
    <x-header/>
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
