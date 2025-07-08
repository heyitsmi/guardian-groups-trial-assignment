<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dr. Ed's Community Corps</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles & Scripts (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center bg-light-gray-bg p-4">
            <div class="w-full max-w-2xl mx-auto bg-white p-8 sm:p-10 rounded-xl shadow-lg text-center">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-800">
                    Dr. Ed's Community Corps
                </h1>
                <p class="mt-4 text-lg text-neutral-slate">
                    A compassion-centered platform to connect helpers with those in need.
                </p>
                <div class="mt-8">
                    @auth
                    <a href="#"
                        class="inline-block rounded-md bg-brand-green px-8 py-4 text-lg font-semibold text-white shadow-sm hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                    Go to Your Dashboard
                    </a>
                    @else
                    <a href="#"
                        class="inline-block rounded-md bg-brand-green px-8 py-4 text-lg font-semibold text-white shadow-sm hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                    Login to Get Started
                    </a>
                    @endauth
                </div>
            </div>
            <!-- Footer -->
            <footer class="absolute bottom-4 text-center text-sm text-gray-500 w-full">
                &copy; {{ date('Y') }} Dr. Ed's Community Corps. All rights reserved.
            </footer>
        </div>
    </body>
</html>