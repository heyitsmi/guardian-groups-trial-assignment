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
            @click.self="show = false"
        >
            <div 
                class="bg-white w-full max-w-xl mx-auto rounded-2xl shadow-xl transform transition-all"
                @click.away="show = false"
            >
                <!-- Search Input -->
                <div class="p-4 border-b border-gray-200">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <input 
                            type="text" 
                            wire:model.live.debounce.300ms="search"
                            placeholder="Search for groups by name or ZIP code..."
                            class="w-full pl-10 pr-4 py-3 border-0 focus:ring-0 text-lg"
                            autofocus
                        >
                    </div>
                </div>

                <!-- Search Results -->
                <div class="p-4 max-h-[60vh] overflow-y-auto">
                    @if (strlen($search) < 2)
                        <div class="text-center py-12 text-gray-500">
                            <p>Please type at least 2 characters to search.</p>
                        </div>
                    @else
                        <ul class="divide-y divide-gray-100">
                            @forelse ($results as $group)
                                <li class="p-4 flex items-center justify-between hover:bg-light-gray-bg rounded-lg transition-colors">
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $group->group_name ?? 'Unnamed Group' }}</h3>
                                        <p class="text-sm text-neutral-slate">
                                            ZIP Code: {{ $group->zip_code }} | {{ $group->members_count }} {{ Str::plural('Member', $group->members_count) }}
                                        </p>
                                    </div>
                                    <div>
                                        @if (in_array($group->id, $userGroupIds))
                                            <span class="text-sm font-medium text-green-600">Joined</span>
                                        @else
                                            <button 
                                                wire:click="joinGroup({{ $group->id }})"
                                                class="bg-brand-green cursor-pointer text-white font-bold py-1 px-3 rounded-md text-sm hover:opacity-90">
                                                Join
                                            </button>
                                        @endif
                                    </div>
                                </li>
                            @empty
                                <li class="text-center py-12 text-gray-500">
                                    <p>No groups found for "<span class="font-semibold">{{ $search }}</span>".</p>
                                </li>
                            @endforelse
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
