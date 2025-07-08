<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - Dr. Ed's Community Corps</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Custom Styles for Modern Look -->
        <style>
            .gradient-heading {
            background: linear-gradient(90deg, #00B386 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            }
            .card-glow {
            box-shadow: 0 0 20px rgba(0, 179, 134, 0.15);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-light-gray-bg">
        <div class="min-h-screen">
            <!-- Navigation Header -->
            <nav class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <h1 class="text-xl font-bold text-brand-green">Dr. Ed's Community Corps</h1>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <!-- Logout Button -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Main Page Content -->
            <main class="py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Dashboard Grid Layout -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Main Content Column -->
                        <div class="lg:col-span-2 space-y-8">
                            <!-- Personal Dashboard Header -->
                            <header class="text-left">
                                <h1 class="text-5xl font-bold text-gray-900 leading-tight">
                                    Hello, <span class="gradient-heading">{{ Auth::user()->name }}</span>!
                                </h1>
                                <p class="mt-2 text-xl text-neutral-slate">It's great to see you. Ready to make a difference?</p>
                            </header>
                            <!-- Main Action Card: "I Can Help Right Now" -->
                            <div class="bg-brand-green text-white p-8 rounded-2xl shadow-lg text-center transform hover:scale-[1.02] transition-transform duration-300 card-glow">
                                <h2 class="text-3xl font-bold">I Can Help Right Now</h2>
                                <p class="mt-2 opacity-90">Find a small task and be someone's bright spot today.</p>
                                <button class="mt-6 bg-white text-brand-green font-bold py-3 px-8 rounded-full shadow-md hover:bg-gray-100 transition-colors text-lg">
                                Find a Micro-Help Task
                                </button>
                            </div>
                            <!-- This Week's Missions Card -->
                            <div class="bg-white p-8 rounded-2xl shadow-lg">
                                <h3 class="text-2xl font-semibold text-gray-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-3 text-sky-blue">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    This Week's Missions
                                </h3>
                                <ul class="mt-6 space-y-4 text-lg">
                                    <li class="flex items-center p-4 bg-light-gray-bg rounded-lg hover:bg-gray-200 transition-colors">
                                        <span class="text-2xl mr-4">✅</span>
                                        <span class="text-gray-700">Check in on your local food bank's information page.</span>
                                    </li>
                                    <li class="flex items-center p-4 bg-light-gray-bg rounded-lg hover:bg-gray-200 transition-colors">
                                        <span class="text-2xl mr-4">💬</span>
                                        <span class="text-gray-700">Reply to one lonely post in the "Anybody There?" forum.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Column -->
                        <div class="lg:col-span-1 space-y-8">
                            <!-- Your Impact Summary -->
                            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                                <p class="text-xl font-medium text-neutral-slate">Your Impact</p>
                                <div class="mt-4">
                                    <p class="text-7xl font-bold text-brand-green">1,250</p>
                                    <p class="text-lg text-gray-600">Points Earned</p>
                                </div>
                            </div>
                            <!-- Your Badges Card -->
                            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                                <p class="text-xl font-medium text-neutral-slate">Your Badges</p>
                                <div class="mt-5 flex justify-center space-x-4">
                                    <div class="flex flex-col items-center">
                                        <span class="text-6xl" title="First Mission">🌟</span>
                                        <span class="text-xs mt-1 text-gray-500">First Mission</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <span class="text-6xl" title="Community Helper">🤝</span>
                                        <span class="text-xs mt-1 text-gray-500">Helper</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <span class="text-6xl text-gray-300" title="Coming Soon">?</span>
                                        <span class="text-xs mt-1 text-gray-400">Locked</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>