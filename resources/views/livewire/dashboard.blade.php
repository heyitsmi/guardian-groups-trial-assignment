<div>
    @livewire('help-now-modal')
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
            @if (session()->has('task_completed_message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-8" role="alert">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('task_completed_message') }}</p>
                </div>
            @endif

            @if (session()->has('new_badge_message'))
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg mb-8" role="alert">
                    <p class="font-bold">🎉 New Badge Unlocked! 🎉</p>
                    <p>{{ session('new_badge_message') }}</p>
                </div>
            @endif
            <!-- Main Action Card: "I Can Help Right Now" -->
            <div class="bg-brand-green text-white p-8 rounded-2xl shadow-lg text-center transform hover:scale-[1.02] transition-transform duration-300 card-glow">
                <h2 class="text-3xl font-bold">I Can Help Right Now</h2>
                <p class="mt-2 opacity-90">Find a small task and be someone's bright spot today.</p>
                <!-- This button now dispatches an event to open the modal -->
                <button 
                    @click="$dispatch('open-help-modal')"
                    class="mt-6 bg-white text-brand-green font-bold py-3 px-8 rounded-full shadow-md hover:bg-gray-100 transition-colors text-lg cursor-pointer">
                Find a Micro-Help Task
                </button>
            </div>
            @livewire('dashboard.missions-display')
            @livewire('dashboard.guardian-group-info')
        </div>
        <!-- Sidebar Column -->
        <div class="lg:col-span-1 space-y-8">
            @livewire('dashboard.points-counter')
            @livewire('dashboard.badges-display')
            @livewire('dashboard.impact-summary')
        </div>
    </div>
</div>