<div class="space-y-8">
    @forelse ($groups as $group)
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <h3 class="text-2xl font-semibold text-gray-800 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-3 text-warm-coral">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962A3.375 3.375 0 0112 15.75c1.28 0 2.462.319 3.499.882A3.375 3.375 0 0112 18.75v-2.25c-2.446 0-4.798.652-6.938 1.855A3.375 3.375 0 014.5 15.75v-2.25c1.55-.825 3.287-1.29 5.062-1.29a3.375 3.375 0 011.438.375M12 12.75a3.375 3.375 0 110-6.75 3.375 3.375 0 010 6.75z" />
                </svg>
                Guardian Group: {{ $group->group_name ?? 'Unnamed Group' }}
            </h3>

            <div class="mt-6 p-4 bg-light-gray-bg rounded-lg">
                <p class="text-lg text-gray-600">
                    Status for ZIP <span class="font-bold text-gray-800">{{ $group->zip_code }}</span>
                </p>
                <p class="mt-1 text-3xl font-bold text-brand-green">
                    {{ $group->members->count() }}
                    <span class="text-xl font-medium text-neutral-slate">Guardians Active</span>
                </p>
            </div>

            <div class="mt-6">
                <h4 class="font-semibold text-gray-700">Group Members:</h4>
                <div class="mt-3 flex flex-wrap gap-4">
                    @foreach ($group->members as $member)
                        <div class="flex items-center" title="{{ $member->name }}">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ $member->avatar_url }}" alt="{{ $member->name }}">
                            <span class="ml-2 text-sm text-gray-600 hidden sm:inline">{{ $member->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
            <h3 class="text-2xl font-semibold text-gray-800">Join a Guardian Group</h3>
            <p class="mt-2 text-neutral-slate">You are not part of any Guardian Group yet. Find a group in your area to start collaborating!</p>
            <div class="mt-6">
                <a href="{{ route('groups.search') }}" wire:navigate class="mt-6 bg-brand-green cursor-pointer text-white font-bold py-3 px-6 rounded-full shadow-md hover:opacity-90 transition-opacity">
                    Find a Group
                </a>
            </div>
        </div>
    @endforelse
</div>