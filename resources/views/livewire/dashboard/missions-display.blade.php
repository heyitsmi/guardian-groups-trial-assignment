<div class="bg-white p-8 rounded-2xl shadow-lg">
    <h3 class="text-2xl font-semibold text-gray-800 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-3 text-sky-blue">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        This Week's Missions
    </h3>
    <ul class="mt-6 space-y-4 text-lg">
        @forelse ($missions as $mission)
            <li class="flex items-center p-4 bg-light-gray-bg rounded-lg">
                <span class="text-2xl mr-4">{{ $mission->icon }}</span>
                <span class="text-gray-700">{{ $mission->title }}</span>
            </li>
        @empty
             <li class="flex items-center p-4 bg-light-gray-bg rounded-lg">
                <span class="text-2xl mr-4">🎉</span>
                <span class="text-gray-700">You've completed all available missions!</span>
            </li>
        @endforelse
    </ul>
</div>
