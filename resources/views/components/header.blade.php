<div x-data>
    <!-- Navigation Header -->
    <nav class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" wire:navigate>
                            <h1 class="text-xl font-bold text-brand-green">{{ config('app.name') }}</h1>
                        </a>
                    </div>

                    <!-- Main Navigation Links (Visible on Desktop) -->
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            Dashboard
                        </x-nav-link>
                        <x-nav-link :href="route('badges')" :active="request()->routeIs('badges')">
                            Badges
                        </x-nav-link>
                        <x-nav-link :href="route('groups.search')" :active="request()->routeIs('groups.search')">
                            Guardian Groups
                        </x-nav-link>
                        <x-nav-link :href="route('trial')" :active="request()->routeIs('trial')">
                            Trial
                        </x-nav-link>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Search Button -->
                    <button @click="$dispatch('open-search-modal')" class="p-2 cursor-pointer rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none" aria-label="Search">
                        <span class="sr-only">Search</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>

                    <!-- User Dropdown Menu -->
                    <div x-data="{ open: false }" class="relative">
                        <div>
                            <button @click="open = !open" type="button" class="flex cursor-pointer items-center max-w-xs bg-gray-100 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}">
                                <span class="hidden sm:block ml-2 mr-3 text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <svg class="hidden sm:block h-5 w-5 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <!-- Dropdown Panel -->
                        <div 
                            x-show="open" 
                            @click.away="open = false" 
                            x-transition:enter="transition ease-out duration-100" 
                            x-transition:enter-start="transform opacity-0 scale-95" 
                            x-transition:enter-end="transform opacity-100 scale-100" 
                            x-transition:leave="transition ease-in duration-75" 
                            x-transition:leave-start="transform opacity-100 scale-100" 
                            x-transition:leave-end="transform opacity-0 scale-95" 
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" 
                            style="display: none;"
                            role="menu" 
                            aria-orientation="vertical" 
                            aria-labelledby="user-menu-button" 
                            tabindex="-1"
                            >
                            <!-- Mobile Navigation Links -->
                            <div class="sm:hidden">
                                <x-dropdown-link :href="route('dashboard')">Dashboard</x-dropdown-link>
                                <x-dropdown-link :href="route('badges')">Badges</x-dropdown-link>
                                <x-dropdown-link :href="route('groups.search')">Groups</x-dropdown-link>
                                <x-dropdown-link :href="route('trial')">Trial</x-dropdown-link>
                                <div class="border-t border-gray-100 my-1"></div>
                            </div>

                            <!-- Profile and Logout Links -->
                            <x-dropdown-link :href="route('profile')">Your Profile</x-dropdown-link>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); this.closest('form').submit();" 
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                                    role="menuitem" 
                                    tabindex="-1">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @livewire('search-modal')
</div>
