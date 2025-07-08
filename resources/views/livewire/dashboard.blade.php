<div>
    <!-- Success Message Area -->
    @if (session()->has('task_completed_message'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-8" role="alert">
        <p class="font-bold">Success!</p>
        <p>{{ session('task_completed_message') }}</p>
    </div>
    @endif
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
                <!-- This button now dispatches an event to open the modal -->
                <button 
                    onclick="Livewire.dispatch('openHelpModal')"
                    class="mt-6 bg-white text-brand-green font-bold py-3 px-8 rounded-full shadow-md hover:bg-gray-100 transition-colors text-lg cursor-pointer">
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
