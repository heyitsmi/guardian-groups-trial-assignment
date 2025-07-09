<div>
    @livewire('help-now-modal')
    @section('styles')
    <style>
        .gradient-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .gradient-ball {
            position: absolute;
            border-radius: 100%;
            opacity: 0.5;
            filter: blur(80px);
            animation: move-ball 20s infinite alternate;
        }
        .ball-1 {
            width: 350px;
            height: 350px;
            background: #00B386;
            top: 10%;
            left: 10%;
            animation-duration: 22s;
        }
        .ball-2 {
            width: 300px;
            height: 300px;
            background: #60A5FA;
            top: 20%;
            right: 15%;
            animation-duration: 25s;
            animation-delay: -5s;
        }
        .ball-3 {
            width: 250px;
            height: 250px;
            background: #FFF9DB;
            bottom: 10%;
            left: 25%;
            animation-duration: 18s;
            animation-delay: -10s;
        }
        @keyframes move-ball {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(150px, -100px);
            }
        }
    </style>
    @endsection
    <div class="relative min-h-screen bg-gray-50 overflow-hidden">
        <div class="gradient-bg">
            <div class="gradient-ball ball-1"></div>
            <div class="gradient-ball ball-2"></div>
            <div class="gradient-ball ball-3"></div>
        </div>
        <div class="relative min-h-screen p-4 sm:p-8 flex items-center justify-center z-10">
            <div class="w-full max-w-4xl bg-white/70 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden">
                <div class="p-8 sm:p-12">
                    <!-- Page Header -->
                    <header class="mb-8 text-center">
                        <h1 class="text-4xl font-bold text-gray-900">Trial Assignment Showcase</h1>
                        <p class="mt-2 text-lg text-neutral-slate">This page demonstrates the "I Can Help Right Now" feature.</p>
                    </header>
                    <div class="text-center max-w-2xl mx-auto">
                        <p class="text-gray-700">
                            The core feature of this assignment is the floating action button located at the bottom-right of your screen. 
                            It displays rotating, encouraging messages to prompt user engagement. Clicking this button will open a modal with randomized micro-help tasks, allowing users to contribute to the community in small, meaningful ways.
                        </p>
                    </div>
                    <div class="mt-8 max-w-xl mx-auto">
                        @if (session()->has('task_completed_message'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert">
                            <p class="font-bold">Success!</p>
                            <p>{{ session('task_completed_message') }}</p>
                        </div>
                        @endif
                        @if (session()->has('new_badge_message'))
                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg mt-4" role="alert">
                            <p class="font-bold">🎉 New Badge Unlocked! 🎉</p>
                            <p>{{ session('new_badge_message') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div 
            x-data="{
                labels: [
                    'I’ve Got a Few Minutes — Who Needs Me?',
                    'Send Me Where I’m Needed Most',
                    'Let Me Be Someone’s Bright Spot Today'
                ],
                currentLabel: 'I’ve Got a Few Minutes — Who Needs Me?',
                changeLabel() {
                    let newLabel = this.labels[Math.floor(Math.random() * this.labels.length)];
                    // Ensure the new label is different from the current one
                    while (newLabel === this.currentLabel) {
                        newLabel = this.labels[Math.floor(Math.random() * this.labels.length)];
                    }
                    this.currentLabel = newLabel;
                }
            }"
            x-init="setInterval(() => changeLabel(), 5000)"
            class="fixed bottom-8 right-8 z-50"
            >
            <button 
                @click="$dispatch('open-help-modal')"
                class="bg-brand-green text-white font-bold py-4 px-6 rounded-full shadow-lg hover:bg-green-700 transition-all duration-300 flex items-center space-x-3 transform hover:scale-105"
                >
                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <!-- Rotating Text -->
                <span x-text="currentLabel" class="transition-all duration-300"></span>
            </button>
        </div>
    </div>
</div>