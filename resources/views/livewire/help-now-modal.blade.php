<div>
    @if ($showModal)
        <div 
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-lg flex items-center justify-center z-50"
            x-data="{ show: @entangle('showModal') }"
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.escape.window="show = false"
        >
            <div 
                class="bg-white w-full max-w-2xl mx-4 sm:mx-0 rounded-2xl shadow-xl p-8 transform transition-all"
                x-show="show"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-10 sm:scale-95"
                @click.away="show = false"
            >
                <!-- Modal Header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900">Choose a Micro-Help Task</h2>
                    <button wire:click="close" class="text-gray-400 hover:text-gray-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="mt-6">
                    <p class="text-neutral-slate mb-6">Pick one of these small tasks to quickly make a big impact. Thank you for being here!</p>
                    
                    <ul class="space-y-4">
                        {{-- Loop through real missions from the database --}}
                        @forelse ($missions as $mission)
                            <li class="p-4 bg-light-gray-bg rounded-lg flex items-center justify-between hover:bg-gray-200 transition-colors">
                                <div class="flex items-center">
                                    <span class="text-3xl mr-4">{{ $mission->icon }}</span>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{ $mission->title }}</h3>
                                        <p class="text-sm text-gray-600">{{ $mission->description }}</p>
                                    </div>
                                </div>
                                <button 
                                    wire:click="completeMission({{ $mission->id }})"
                                    wire:loading.attr="disabled"
                                    class="ml-4 bg-brand-green text-white cursor-pointer font-bold py-2 px-4 rounded-lg shadow-md hover:opacity-90 transition-opacity text-sm whitespace-nowrap">
                                    Help Now
                                </button>
                            </li>
                        @empty
                            <li class="text-center text-gray-500 py-4">No new missions available right now. Great job clearing the board!</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
