<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Dr. Ed's Community Corps</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles & Scripts (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-light-gray-bg">
        <div class="blob-container">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
        </div>
        <div class="relative min-h-screen flex flex-col items-center justify-center p-4 z-10">
            <div class="w-full max-w-md mx-auto bg-white/60 backdrop-blur-xl p-8 sm:p-10 rounded-2xl shadow-lg">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Welcome Back!
                    </h1>
                    <p class="mt-2 text-neutral-slate">
                        Please sign in to continue.
                    </p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input id="email" type="email" name="email" required autofocus
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-green focus:border-brand-green sm:text-sm" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-green focus:border-brand-green sm:text-sm" />
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-brand-green border-gray-300 rounded focus:ring-brand-green">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-semibold text-white bg-brand-green hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-opacity duration-200">
                        Sign In
                        </button>
                    </div>
                </form>
                <p class="mt-8 text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-medium text-brand-green hover:underline">
                    Sign up
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>