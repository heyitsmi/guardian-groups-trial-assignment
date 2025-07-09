<div class="bg-white p-8 rounded-2xl shadow-lg text-center">
    <p class="text-xl font-medium text-neutral-slate">Your Badges</p>
    <div class="mt-5 flex justify-center items-start space-x-4">
        
        @forelse ($badges as $badge)
            <div class="flex flex-col items-center w-16">
                <span class="text-6xl" title="{{ $badge->name }}">{{ $badge->icon }}</span>
                <span class="text-xs mt-1 text-gray-500 text-center">{{ $badge->name }}</span>
            </div>
        @empty
            <p class="text-sm text-gray-500 col-span-full">You haven't earned any badges yet. Keep helping to unlock them!</p>
        @endforelse

    </div>
</div>
