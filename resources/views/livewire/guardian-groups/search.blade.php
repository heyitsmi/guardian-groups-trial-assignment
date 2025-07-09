<div>
    {{-- Page Header --}}
    <header class="bg-white shadow-sm mb-6">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                Find a Guardian Group
            </h1>
            <p class="mt-1 text-neutral-slate">Search for a group by name or ZIP code to join.</p>
        </div>
    </header>
    {{-- Search Input --}}
    <div class="mb-8">
        <input 
            wire:model.live.debounce.300ms="search"
            type="text" 
            placeholder="Search by group name or ZIP code..."
            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-brand-green focus:border-brand-green"
        >
    </div>

    {{-- Loading Indicator --}}
    <div wire:loading.flex class="justify-center items-center py-8">
        <svg class="animate-spin h-8 w-8 text-brand-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    {{-- Groups List --}}
    <div wire:loading.remove class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <ul class="divide-y divide-gray-200">
            @forelse ($groups as $group)
                <li class="p-6 flex items-center justify-between hover:bg-light-gray-bg transition-colors">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $group->group_name ?? 'Unnamed Group' }}</h3>
                        <p class="text-sm text-neutral-slate">
                            ZIP Code: {{ $group->zip_code }} | {{ $group->members_count }} {{ Str::plural('Member', $group->members_count) }}
                        </p>
                    </div>
                    <div>
                        @if (in_array($group->id, $userGroupIds))
                            <span class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100">
                                Joined
                            </span>
                        @else
                            <button 
                                wire:click="joinGroup({{ $group->id }})"
                                wire:loading.attr="disabled"
                                class="inline-flex cursor-pointer items-center px-4 py-2 bg-brand-green border border-transparent rounded-md font-semibold text-sm text-white hover:opacity-90 disabled:opacity-50">
                                Join Group
                            </button>
                        @endif
                    </div>
                </li>
            @empty
                <li class="p-6 text-center text-gray-500">
                    No groups found matching your search.
                </li>
            @endforelse
        </ul>
    </div>

    {{-- Pagination Links --}}
    <div class="mt-8">
        {{ $groups->links() }}
    </div>
</div>