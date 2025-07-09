<div>
    {{-- Page Header --}}
    <header class="bg-white shadow-sm mb-6">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                Your Badge Collection
            </h1>
            <p class="mt-1 text-neutral-slate">Track your achievements and discover new ways to contribute.</p>
        </div>
    </header>
    {{-- Section for Earned Badges --}}
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 px-4 sm:px-0">Your Earned Badges</h2>
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">            @forelse ($earnedBadges as $badge)
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center border-t-4 border-brand-green">
                <div class="text-7xl">{{ $badge->icon }}</div>
                <h3 class="mt-4 text-lg font-bold text-gray-900">{{ $badge->name }}</h3>
                <p class="mt-1 text-sm text-gray-600">{{ $badge->short_description }}</p>
            </div>
            @empty
            <p class="col-span-full text-center text-gray-500 py-4">You haven't earned any badges yet. Complete tasks to start your collection!</p>
            @endforelse
        </div>
    </div>
    @if($lockedBadges->count() > 0)
    <div>
        <h2 class="text-2xl font-semibold text-gray-800 px-4 sm:px-0">Badges to Unlock</h2>
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($lockedBadges as $badge)
            <div class="bg-white p-6 rounded-2xl shadow-md text-center opacity-60 grayscale">
                <div class="relative">
                    <div class="text-7xl">{{ $badge->icon }}</div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>
                <h3 class="mt-4 text-lg font-bold text-gray-900">{{ $badge->name }}</h3>
                <p class="mt-1 text-sm text-gray-600">Requires {{ $badge->required_points }} points to unlock.</p>
            </div>
            @empty
            <p class="col-span-full text-center text-gray-500 py-4">
                You've earned all the badges!
            </p>
            @endforelse
        </div>
    </div>
    @endif
</div>